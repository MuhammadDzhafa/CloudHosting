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
        'name',
        'description',
        'price',
        'billing_cycle',
        'status',
        'order_id'  // Tambahkan order_id ke fillable
    ];

    protected $attributes = [
        'billing_cycle' => 'monthly',
        'status' => 'active'
    ];

    // Relasi ke model Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
