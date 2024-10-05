<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMainSpec extends Model
{
    use HasFactory;
    protected $table = 'custom_main_spec';
    protected $primaryKey = 'custom_main_spec_id'; // Pastikan ini sesuai dengan skema database

    protected $fillable = [
        'min_RAM', 
        'max_RAM', 
        'multiplier_RAM', 
        'price_RAM',
        'min_storage', 
        'max_storage', 
        'multiplier_storage', 
        'price_storage',
        'min_CPU', 
        'max_CPU', 
        'step_CPU', 
        'price_CPU',
        'hosting_plans_id'
    ];

    public function hostingPlan()
    {
        return $this->belongsTo(HostingPlan::class, 'hosting_plans_id', 'hosting_plans_id');
    }

}
