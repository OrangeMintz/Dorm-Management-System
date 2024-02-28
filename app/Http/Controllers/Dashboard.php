<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class Dashboard extends Controller
{
    
    function viewDashboard(){
        return view('dashboard');
    }

    function viewTenantDashboard(){
        $domain = tenant('domain');
        $tenant = Tenant::where('domain', $domain)->first();
        return view('dashboard')->with('tenant', $tenant);
    }
}
