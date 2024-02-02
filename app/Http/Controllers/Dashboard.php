<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    
    function viewDashboard(){
        return view('dashboard');
    }
}
