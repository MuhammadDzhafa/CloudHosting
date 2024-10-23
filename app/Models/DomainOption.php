<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'domain_option_id';

    protected $fillable = [
        'domain_order_type'
    ];
}

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'status',
        'total_price',
        'tax',
        'payment_method',
        'date_created',
        'billing_address_id'
    ];

    protected $casts = [
        'date_created' => 'datetime',
        'total_price' => 'integer',
        'tax' => 'integer',
    ];
}
