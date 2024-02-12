<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    
    protected $table = "tenants";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'id',
        'tenant_name',
        'domain',
        'tenant_admin',
        'address',
        'database',
        'subscription',
     ];

     /**
     * Get the admin user for this tenant.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'tenant_admin');
    }
    

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'tenant_name',
            'domain',
            'tenant_admin',
            'address',
            'database',
            'subscription',
        ];
    }

}