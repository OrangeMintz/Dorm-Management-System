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
    public function __construct(DatabaseManager $database){
        $this->db = $database;
    }

    function viewTenants(){
        return view('tenants');
    }

    function tenantsPost(Request $request){

        $database = $request->domain;

        //Split ID from tenant_admin
        $tenantAdminId = (int)substr($request->input('tenant_admin'), 1, strpos($request->input('tenant_admin'), '') - 1);
        $request->merge([
            'tenant_admin' => $tenantAdminId,
            'domain' => $request->domain . ".dormy.com",
            'database' => $database,
            'subscription' => "basic",
        ]);

        $createDatabase = $this->createDatabase($database);

        if(!$createDatabase){
            return redirect(route('tenants'))->with("error", "Error creating database for tenant!");
        }else{
            //Validate request data
            $request->validate([
                'tenant_name' => 'required|string',
                'domain' => 'required|string|unique:tenants',
                'tenant_admin' => 'required|exists:users,id',
                'address' => 'required|string',
                'database' => 'required|string|unique:tenants',
                'subscription' => 'required|string',
            ]);

            //store tenant in database
            $tenant = Tenant::create([
                'tenant_name' => $request->tenant_name,
                'domain' => $request->domain,
                'tenant_admin' => $request->tenant_admin,
                'address' => $request->address,
                'database' => $request->database,
                'subscription' => $request->subscription,
            ]);

            if(!$tenant){
                return redirect(route('tenants'))->with("error", "Error adding tenant!");
            }else{
                return redirect(route('tenants'))->with("success", "Tenant added successfully!");
            }
        }       
    }

     //function for automated database creation and migration
     public function createDatabase($databaseName){
        try {
            $this->db->statement("CREATE DATABASE IF NOT EXISTS $databaseName");

            // change the database connection dynamically
            config(['database.connections.new.database' => $databaseName]);
            DB::purge('new');
            Artisan::call('migrate', [
                '--database' => 'new',
                '--path' => 'database/tenant_migrations',
            ]);
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
