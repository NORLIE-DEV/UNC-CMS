<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout sucessfull');
    }

    public function store(Request $request)
    {
        //dd($request);
        //    return response()->json(['res'=>'getted']);

        $validated = $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed', // 'password_confirmation' field must match 'password'
            'gender' => "required",
            'birthdate' => 'required|date',
            'usertype' => "required"
        ]);
        if ($request->hasFile('user_image')) {
            // dd($request);
            $request->validate([
                "user_image" => 'mimes:jpeg,png,bmp,tiff,svg |max:4096'
            ]);

            $filenameWithExtension = $request->file("user_image");

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file("user_image")->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $smallThumbnail = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/user', $filenameToStore);
            $request->file('user_image')->storeAs('public/user/thumbnail', $smallThumbnail);

            $thumbNail = 'storage/user/thumbnail/' . $smallThumbnail;

            $this->createThumbnail($thumbNail, 150, 93);

            $validated['user_image'] = $filenameToStore;
        }

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return response()->json(['message' => 'Registration successful'], 200);
    }

    public function createThumbnail($path, $with, $height)
    {
        $img = Image::make($path)->resize($with, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/')->with('message', 'Data was successfully deleted');
        //dd($request);
    }


    public function adminStudent()
    {
        return view('admin.student');
    }
    public function adminHome()
    {
        return view('admin.home');
    }

    function check(Request $request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');
            $data = DB::table("users")
                ->where('email', $email)
                ->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }
}
