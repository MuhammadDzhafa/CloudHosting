<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLD extends Model
{
    use HasFactory;

    protected $table = 'tld'; // Nama tabel yang digunakan oleh model

    protected $primaryKey = 'tld_id'; // Menyatakan bahwa `tld_id` adalah primary key

    protected $fillable = [
        'tld_name', // Nama TLD
        'tld_price', // Harga TLD
        'category'   // Kategori TLD
    ];
}
