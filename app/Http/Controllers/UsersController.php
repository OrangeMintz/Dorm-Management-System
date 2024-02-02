<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function viewUsers()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
}
