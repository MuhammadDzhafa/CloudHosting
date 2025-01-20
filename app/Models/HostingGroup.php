<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hosting_groups'; // Nama tabel
    protected $primaryKey = 'hosting_group_id'; // Primary key

    protected $fillable = [
        'name',
    ];

    public function hostingPlans()
    {
        return $this->hasMany(HostingPlan::class, 'hosting_group_id');
    }
}


