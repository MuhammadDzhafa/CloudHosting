<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes

class Price extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    protected $table = 'prices';

    protected $primaryKey = 'price_id';

    protected $fillable = [
        'price',
        'discount',
        'price_after',
        'hosting_plans_id',
        'duration'
    ];

    // Relasi ke model HostingPlan
    public function hostingPlan()
    {
        return $this->belongsTo(HostingPlan::class, 'hosting_plans_id', 'hosting_plans_id');
    }
}
