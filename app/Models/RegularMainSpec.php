<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularMainSpec extends Model
{
    use HasFactory;

    protected $table = 'regular_main_spec'; // Nama tabel yang digunakan oleh model
    protected $primaryKey = 'regular_main_spec_id'; // Tentukan primary key yang digunakan

    // Tentukan atribut yang dapat diisi
    protected $fillable = ['RAM', 'storage', 'CPU', 'hosting_plans_id'];

    /**
     * Relasi ke HostingPlan
     */
    public function hostingPlan()
    {
        return $this->belongsTo(HostingPlan::class, 'hosting_plans_id', 'hosting_plans_id');
    }
}


