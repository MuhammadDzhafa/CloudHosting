<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostingPlan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $primaryKey = 'hosting_plans_id';

    protected $fillable = [
        'hostingplan_id',
        'group_id',
        'name',
        'max_domain',
        'max_addon_domain',
        'max_email_account',
        'max_database',
        'max_io',
        'nproc',
        'entry_process',
        'max_bandwidth',
        'ssl',
        'backup',
        'RAM',
        'storage',
        'CPU',
        'description',
        'type'
    ];
}
