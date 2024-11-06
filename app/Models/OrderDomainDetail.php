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
        'expired_date',
        'domain_order_id'  // Menambahkan domain_order_id ke daftar fillable
    ];

    protected $casts = [
        'active_date' => 'datetime',
        'expired_date' => 'datetime',
        'price' => 'integer',
        'whois' => 'boolean',
        'dns_management' => 'boolean',
    ];

    /**
     * Relasi ke Order (One to One).
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Relasi ke DomainOption (One to Many).
     */
    public function domainOption()
    {
        return $this->belongsTo(DomainOption::class, 'domain_order_id', 'domain_option_id');
    }
}
