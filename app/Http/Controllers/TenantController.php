<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Tenant;

class TenantController extends Controller
{
    function viewTenants(){
        return view('tenants');
    }

    function tenantsPost(Request $request){

        //Split ID from tenant_admin
        $tenantAdminId = (int)substr($request->input('tenant_admin'), 1, strpos($request->input('tenant_admin'), '') - 1);
        $request->merge([
            'tenant_admin' => $tenantAdminId,
            'domain' => $request->domain . ".dormy.com"
        ]);

        //Validate request data
        $request->validate([
            'tenant_name' => 'required|string',
            'domain' => 'required|string',
            'tenant_admin' => 'required|exists:users,id',
            'address' => 'required|string',
        ]);

        $tenant = Tenant::create([
            'tenant_name' => $request->tenant_name,
            'domain' => $request->domain,
            'tenant_admin' => $request->tenant_admin,
            'address' => $request->address
        ]);

        if(!$tenant){
            return redirect(route('tenants'))->with("error", "Error adding tenant!");
        }else{
            return redirect(route('tenants'))->with("success", "Tenant added successfully!");
        }
    }
}
