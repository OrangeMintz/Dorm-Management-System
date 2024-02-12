<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Tenant;

class TenantController extends Controller
{
    //constructor for building DatabaseManager
    protected $db;
    public function __construct(DatabaseManager $database)
    {
        $this->db = $database;
    }

    function viewTenants()
    {

        // Populate the foreign key inside Tenant, with('admin') is in Tenant Model
        $tenants = Tenant::with('admin')->get();
        return view('tenants', compact('tenants'));
    }

    function tenantsPost(Request $request)
    {
        $database = $request->domain;

        //Split ID from tenant_admin if provided
        $tenantAdminId = null;
        if ($request->filled('tenant_admin')) {
            $tenantAdminId = (int)substr($request->input('tenant_admin'), 1, strpos($request->input('tenant_admin'), '') - 1);
        }

        $request->merge([
            'tenant_admin' => $tenantAdminId,
            'domain' => $request->domain . ".localhost",
            'database' => $database,
            'subscription' => "basic",
        ]);

        // Validate request data
        $request->validate([
            'tenant_name' => 'required|string',
            'domain' => 'required|string|unique:tenants',
            'tenant_admin' => [
                'nullable', // Tenant admin can be nullable
                Rule::exists('users', 'id')->where(function ($query) use ($tenantAdminId) {
                    $query->where('id', $tenantAdminId);
                }),
            ],
            'address' => 'required|string',
            'database' => 'required|string|unique:tenants',
            'subscription' => 'required|string',
        ]);

        // Store tenant in database
        $tenant = Tenant::create([
            'id' => $request->database,
            'tenancy_db_name' => $request->database,
            'tenant_name' => $request->tenant_name,
            'domain' => $request->domain,
            'tenant_admin' => $request->tenant_admin,
            'address' => $request->address,
            'database' => $request->database,
            'subscription' => $request->subscription,
        ]);
        
        if (!$tenant) {
            return redirect(route('tenants'))->with("error", "Error adding tenant!");
        } else {

            // add the domain for the newly created tenant
            // Create the domain for the tenant
            $tenant->domains()->create(['domain' => $tenant->domain]);

            return redirect(route('tenants'))->with("success", "Tenant added successfully!");
        }
    }

}
