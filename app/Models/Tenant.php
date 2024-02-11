<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tenant extends Model
{
    use HasFactory;

    protected $table = "tenants";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
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
}
