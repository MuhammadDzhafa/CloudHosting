<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingAddress extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'billing_id';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'country',
        'post_code',
        'phone',
        'company_name'
    ];

    protected $dates = ['deleted_at'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'billing_address_id', 'billing_id');
    }
}
