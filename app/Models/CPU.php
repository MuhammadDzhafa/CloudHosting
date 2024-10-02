<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;

    protected $primaryKey = 'cpu_id';
    protected $fillable = [
        'minimum',
        'maximum',
        'price'
    ];
}
