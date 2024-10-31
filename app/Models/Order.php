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
        'tax',
        'payment_method',
        'date_created',
        'billing_address_id'
    ];

    public function billingAddress()
    {
        return $this->belongsTo(BillingAddress::class, 'billing_address_id', 'billing_id');
    }

    public function domainDetails()
    {
        return $this->hasMany(OrderDomainDetail::class, 'order_id', 'order_id');
    }

    public function hostingDetails()
    {
        return $this->hasMany(OrderHostingDetail::class, 'order_id', 'order_id');
    }

    public function addons()
    {
        return $this->hasMany(Addon::class, 'order_id', 'order_id');
    }
}
