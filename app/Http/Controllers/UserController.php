<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }


    public function index()
    {
        $users = User::simplePaginate(5);
        return view('admin.useraccount', compact('users'));
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            "usertype" => 'required',
            "email" => 'required|email',
            "password" => "required"
        ]);
        //dd($request);
        if (auth()->attempt($validated)) {
            if (auth()->user()->usertype == 0) {
                $request->session()->regenerate();
                return redirect()->route('doctor.home');
            } else if (auth()->user()->usertype == 1) {
                $request->session()->regenerate();
                return redirect()->route('nurse.home');
            } else if (auth()->user()->usertype == 2) {
                $request->session()->regenerate();
                return redirect('/admin/home')->with('message', 'Login Successfull!');
            } else {
                return back()->withErrors(['error_message' => 'You dont have access to this site!']);
            }
        } else {
            return back()->withErrors(['error_message' => 'Email and Password does not matched!'])->onlyInput('email');
        }
    }

    public function findID($id)
    {
        $data = User::findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'Message' => "USER NOT FOUND!",
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            //"email" => ['required', 'email', Rule::unique('users', 'email')],
            'gender' => "required",
            'birthdate' => 'required|date',
            //'usertype' => "required"
        ]);

        $user = User::find($id);
        if ($user) {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            // $user->email = $request->input('email');
            $user->gender = $request->input('gender');
            $user->birthdate = $request->input('birthdate');
            //$user->usertype = $request->input('usertype');
            $user->update($validated);
            return response()->json([
                'status' => 200,
                'message' => 'User Updated Successfully',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User Not found!',
            ]);
        }
    }

    public function search(Request $request)
    {

        if ($request->ajax()) {
            $users = User::where('id', 'LIKE', '%' . $request->search . '%')->orWhere('first_name', 'LIKE', '%' . $request->search . '%')->get();

            $output = '';

            if (count($users) > 0) {
                $output = '
                <table class="table-auto w-full text-left">
                    <thead class="text-gray-200 uppercase bg-blue-500 font-bold">
                        <tr>
                            <td class="py-3  text-center  p-4">ID</td>
                            <td class="py-3  text-center  p-4">Firstname</td>
                            <td class="py-3  text-center  p-4">Lastname</td>
                            <td class="py-3  text-center  p-4">Email</td>
                            <td class="py-3  text-center  p-4">Gender</td>
                            <td class="py-3  text-center  p-4">BirthDate</td>
                            <td class="py-3  text-center  p-4">usertype</td>
                            <td class="py-3  text-center  p-4"></td>
                            <td class="py-3  text-center  p-4">operation</td>
                            <td class="py-3  text-center  p-4"></td>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-500">';
                foreach ($users as $user) {
                    $output .= '  <tr class="py-2">
                            <td class="py-2  text-center  p-4">' . $user->id . '</td>
                            <td class="py-2  text-center  p-4">' . $user->first_name . '</td>
                            <td class="py-2  text-center  p-4">' . $user->last_name . '</td>
                            <td class="py-2  text-center  p-4">' . $user->email . '</td>
                            <td class="py-2  text-center  p-4">' . $user->gender . '</td>
                            <td class="py-2  text-center  p-4">' . $user->birthdate . '</td>
                            <td class="py-2  text-center  p-4">' . $user->usertype . '</td>

                            <td class="py-2  text-center  p-4"><button id="btn_edit" value=' . $user->id . '><i
                                        class="fa-solid fa-pen-to-square text-green-500"></i></button></td>
                            <td class="py-2  text-center  p-4"><button id="btn_delete"
                                    value=' . $user->id . '><i
                                        class="fa-solid fa-user-xmark text-red-500"></i></button></td>
                            <td class="py-2  text-center  p-4"><a href="javascript:void(1)" id="view"
                                    data-url=""><i class="fa-solid fa-eye text-yellow-500"></i></a></td>
                        </tr>';
                }
                $output .= '</tbody>
                </table>
                ';
            } else {
                $output .= 'NO RESULTS';
            }
        }

        return $output;
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted successfully!'
        ]);
    }

    public function adminHome()
    {
        return view('admin.home');
    }

    public function doctorHome()
    {
        return view('doctor.home');
    }

    public function nurseHome()
    {
        return view('nurse.home');
    }

    public function adminUserAccount()
    {
        $user = array("users" => DB::table('users')->orderBy('id', 'asc')->simplepaginate(10));
        return view('admin.useraccount', $user);
    }
}
