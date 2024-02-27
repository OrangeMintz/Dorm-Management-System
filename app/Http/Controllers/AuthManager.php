<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login()
    {
        return view('login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user.attributes);

            // Check if the user has the position of super admin
            if ($user->position === 'super admin') {
                // Store the user in the session
                session(['user' => $user]);
                // Redirect to the intended page (dashboard)
                return redirect()->intended('dashboard');
            } else {
                // If the user does not have the position of super admin, log them out and show an error message
                Auth::logout();
                return redirect(route('login'))->with("error", "Unauthorized access!");
            }
            
        } else {
            return redirect(route('login'))->with("error", "Invalid username or password!");
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
