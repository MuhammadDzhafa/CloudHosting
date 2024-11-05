<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillingAddress extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'billing_id';

    protected $fillable = [
        'user_id',
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'country',
        'post_code',
        'company_name'
    ];

    protected $dates = ['deleted_at'];

    // Perbaiki relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class); // Sesuaikan dengan kolom id di users
    }
}