<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLD extends Model
{
    use HasFactory;

    protected $table = 'tld';

    protected $primaryKey = 'tld_id';
    protected $fillable = [
        'tld_name',
        'tld_price',
        'category'
    ];
}
