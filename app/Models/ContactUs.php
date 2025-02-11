<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Import SoftDeletes trait

class ContactUs extends Model
{
    use HasFactory, SoftDeletes;  // Tambahkan SoftDeletes untuk mendukung soft deletes

    protected $fillable = ['name', 'email', 'message'];

    // Tentukan nama tabel
    protected $table = 'contact_us';

    // Tentukan kunci utama
    protected $primaryKey = 'contact_us_id';

    // Jika kunci utama bukan 'id' dan bukan auto-increment
    public $incrementing = true; // Ubah menjadi false jika bukan auto-increment
}
