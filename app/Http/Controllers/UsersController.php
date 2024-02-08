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
            'position' => 'required', // We can add more validations
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

    function usersPut(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'nullable|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone_number' => 'nullable|string',
            'position' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'username' => 'nullable|string|unique:users,username,' . $id,
            'password' => 'nullable|string', // We can add more validations
        ]);

        // Remove fields with null values from the validated data
        $validatedData = array_filter($validatedData, function ($value) {
            return !is_null($value);
        });

        // Hash password if provided
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user->update($validatedData);
        return redirect(route('users'))->with("success", "User updated successfully!");
    }
}
