<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Import SoftDeletes trait

class Role extends Model
{
    use SoftDeletes;  // Menambahkan SoftDeletes trait

    protected $fillable = ['name'];

    // Relasi many-to-many dengan model User
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    // Tentukan kolom yang digunakan untuk soft deletes
    protected $dates = ['deleted_at']; // Menentukan kolom 'deleted_at' sebagai tipe tanggal
}
