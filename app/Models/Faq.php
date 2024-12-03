<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs'; // Nama tabel yang digunakan oleh model

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'question',
        'answer',
        'category',
    ];

    // Tentukan primary key
    protected $primaryKey = 'faq_id'; // Gunakan 'faq_id' sebagai primary key

    // Jika primary key bukan tipe integer
    public $incrementing = false; // Jika menggunakan UUID atau jenis lain
    protected $keyType = 'int'; // Jika menggunakan integer
    public $timestamps = true;
}
