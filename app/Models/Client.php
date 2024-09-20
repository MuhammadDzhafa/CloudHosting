<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
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

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}