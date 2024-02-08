<?php

namespace App\Http\Controllers;

use App\Mail\CredentialsMail;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    function viewUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    function usersPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'position' => 'required',
        ]);

        $plainPassword = Str::random(10);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'position' => $request->position,
            'birth_date' => $request->birth_date,
            'username' => $request->username,
            'password' => Hash::make($plainPassword)
        ]);

        if (!$user) {
            //Send email with user data
            return redirect(route('users'))->with("error", "Invalid username or password!");
        } else {
            Mail::to($request->email)->send(new CredentialsMail($user, $plainPassword));
            return redirect(route('users'))->with("success", "User added successfully!");
        }
    }
}
