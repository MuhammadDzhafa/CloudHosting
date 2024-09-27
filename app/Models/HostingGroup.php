<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingGroup extends Model
{
    use HasFactory;

    protected $table = 'hosting_groups'; // Nama tabel
    protected $primaryKey = 'hosting_group_id'; // Primary key

    protected $fillable = [
        'name',
    ];
}
