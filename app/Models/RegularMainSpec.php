<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularMainSpec extends Model
{
    use HasFactory;

    protected $table = 'regular_main_spec';
    protected $primaryKey = 'regular_main_spec_id'; // Pastikan ini sesuai dengan skema database

    // Tambahkan 'hosting_plans_id' ke fillable
    protected $fillable = ['RAM', 'storage', 'CPU', 'hosting_plans_id'];

    public function hostingPlan()
    {
        return $this->belongsTo(HostingPlan::class, 'hosting_plans_id', 'hosting_plans_id');
    }
}

