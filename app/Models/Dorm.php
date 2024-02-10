<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Dorm extends Model
{
    use HasFactory;

    protected $table = "dorms";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'dorm_head',
        'dorm_name',
        'address',
        'rooms',
     ];

     /**
     * Get the dorm head user for this tenant.
     */
    public function dormHead()
    {
        return $this->belongsTo(Employee::class, 'dorm_head');
    }
}
