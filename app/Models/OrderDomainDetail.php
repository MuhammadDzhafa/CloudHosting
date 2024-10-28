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
        'domain_option_id',
        'dns_management',
        'whois',
        'price',
        'active_date',
        'expired_date'
    ];

    protected $casts = [
        'dns_management' => 'boolean',
        'whois' => 'boolean',
        'price' => 'integer',
        'active_date' => 'datetime',
        'expired_date' => 'datetime'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
