<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes; // Tambahkan SoftDeletes untuk mendukung soft delete

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'email',
        'password',
        'phone_number',
        'name',
        'picture',
        'occupation',
        'facebook',
        'instagram'
    ];

    // Relasi dengan model Testimonial
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    // Laravel otomatis mengelola 'created_at' dan 'updated_at' dengan menggunakan $timestamps
}
