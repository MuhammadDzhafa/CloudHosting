<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'addons';

    protected $fillable = [
        'daily_backup',
        'active_date',
        'expired_date',
        'email_protection',
        'price',
        'order_id'
    ];

    protected $casts = [
        'daily_backup' => 'boolean',
        'email_protection' => 'boolean',
        'price' => 'integer',
        'active_date' => 'timestamp',
        'expired_date' => 'timestamp'
    ];

    // Ubah relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
