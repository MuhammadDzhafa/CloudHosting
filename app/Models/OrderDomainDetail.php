<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDomainDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'domain_order_id',
        'domain_option_id',
        'dns_management',
        'active_date',
        'expired_date',
        'domain_name',
        'price',
        'whois'
    ];

    protected $casts = [
        'active_date' => 'datetime',
        'expired_date' => 'datetime',
        'price' => 'integer',
        'dns_management' => 'boolean',
        'whois' => 'boolean'
    ];
}
