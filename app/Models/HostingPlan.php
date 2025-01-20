<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingPlan extends Model
{
    use SoftDeletes, HasFactory;

    protected $primaryKey = 'hosting_plans_id';

    protected $fillable = [
        'name',
        'hosting_group_id', // Pastikan nama fieldnya sudah benar
        'product_type',
        'package_type',
        'description',
        'max_io',
        'nproc',
        'entry_process',
        'ssl',
        'backup',
        'max_database',
        'max_bandwidth',
        'max_email_account',
        'max_ftp_account',
        'max_domain',
        'max_addon_domain',
        'max_parked_domain',
        'ssh',
        'free_domain',
        'best_seller'
    ];

    // Relasi ke model Price
    public function prices()
    {
        return $this->hasMany(Price::class, 'hosting_plans_id', 'hosting_plans_id');
    }

    // Relasi ke model HostingGroup
    public function hostingGroup()
    {
        return $this->belongsTo(HostingGroup::class, 'hosting_group_id', 'hosting_group_id');
    }

    // Relasi ke model CustomMainSpec
    public function customSpec()
    {
        return $this->hasOne(CustomMainSpec::class, 'hosting_plans_id', 'hosting_plans_id');
    }

    // Relasi ke model RegularMainSpec
    public function regularSpec()
    {
        return $this->hasOne(RegularMainSpec::class, 'hosting_plans_id', 'hosting_plans_id');
    }
}
