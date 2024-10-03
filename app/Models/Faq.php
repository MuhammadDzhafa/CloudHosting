<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'question',
        'answer',
        'category',
    ];
}
