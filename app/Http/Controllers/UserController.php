<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{

    public function login(){
        return view('auth.login');
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
            if(auth()->user()->usertype ==0){
                $request->session()->regenerate();
                return redirect()->route('doctor.home');
            }
            else if(auth()->user()->usertype ==1){
                $request->session()->regenerate();
                return redirect()->route('nurse.home');
            }
            else if(auth()->user()->usertype ==2){
                $request->session()->regenerate();
                return redirect()->route('admin.home');
            }
            else{
                return abort(404);
            }
        } else {
            dd("notsucess");
        }
    }

    public function adminHome(){
        return view('admin.home');
    }

    public function doctorHome(){
        return view('doctor.home');
    }

    public function nurseHome(){
        return view('nurse.home');
    }

}
