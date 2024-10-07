<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message'];

    // Tambahkan properti ini untuk menggunakan tabel `contact_us`
    protected $table = 'contact_us';
}
