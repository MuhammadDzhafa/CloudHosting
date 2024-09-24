<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at']; // Agar deleted_at dianggap sebagai instance DateTime
    protected $table = 'testimonials';
    protected $primaryKey = 'testimonial_id';

    protected $fillable = [
        'domain_web',
        'testimonial_text',
        'picture',
        'occupation',
        'facebook',
        'instagram'
    ];

    // Kolom soft delete
}
