<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard');
        }else{
            return redirect(route('login'))->with("error", "Login details are valid!");
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
