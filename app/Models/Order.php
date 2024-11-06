<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'order_id',
        'status',
        'total_price',
        'payment_method',
        'date_created',
        // 'user_id' dihapus dari sini
    ];

    // Relasi "Made by" dengan User (N:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi "Contains" dengan Order_Domain_Detail (1:1)
    public function domainDetail()
    {
        return $this->hasOne(OrderDomainDetail::class, 'order_id', 'order_id');
    }

    // Relasi "Includes" dengan add-ons
    public function addons()
    {
        return $this->hasMany(Addon::class, 'order_id', 'order_id');
    }

    // Relasi "Includes" dengan hosting details (1:n)
    public function hosting()
    {
        return $this->hasMany(OrderHostingDetail::class, 'order_id', 'order_id');
    }
}
