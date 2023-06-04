<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    

    public function index(){
        if(Auth::user()){
            return redirect()->route("private.page");
        }

        return view("login");
    }

    public function login_attempt(Request $request){
        $credentials = $request->validate([
            "email" => ["required"],
            "password" => ["required"]
        ]);

        if(!Auth::attempt($credentials)){
            $request->session()->flush();
            Auth::logout();
            return back()->writerErrors("msgerror");
        }

        return redirect()->route("private.page");
    }

    public function logout_account(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route("home.page");
    }
}
