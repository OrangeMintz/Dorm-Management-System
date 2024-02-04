<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required'
        ]);

        $data['first_name'] = $request->first_name;
        $data['middle_name'] = $request->middle_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['position'] = $request->position;
        $data['birth_date'] = $request->birth_date;
        $data['username'] = $request->username;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('users'))->with("error", "Invalid username or password!");
        } else {
            return redirect(route('users'))->with("success", "User added successfully!");
        }
    }

}
