<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Import SoftDeletes trait

class Article extends Model
{
    use HasFactory, SoftDeletes;  // Tambahkan SoftDeletes untuk mendukung soft deletes

    protected $table = 'articles'; // Nama tabel
    protected $primaryKey = 'article_id'; // Primary key

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'title',
        'content',
        'author',
        'likes',
        'image', // Tambahkan image di sini
    ];

    // Tentukan kolom yang digunakan untuk soft deletes
    protected $dates = ['deleted_at']; // Menentukan kolom 'deleted_at' sebagai tipe tanggal
}
