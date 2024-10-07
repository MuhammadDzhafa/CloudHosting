<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

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
}
