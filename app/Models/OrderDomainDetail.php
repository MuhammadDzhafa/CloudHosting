<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDomainDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'domain_name',
        'whois',
        'dns_management',
        'price',
        'active_date', 
        'expired_date'
    ];

    protected $casts = [
        'active_date' => 'datetime',
        'expired_date' => 'datetime',
        'price' => 'integer',
        'whois' => 'boolean',
        'dns_management' => 'boolean'
    ];

    // Relasi ke Order (1:1)
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}