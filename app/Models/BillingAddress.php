<?php
// app/Models/BillingAddress.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'billing_id';
    
    protected $fillable = [
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'country',
        'post_code',
        'company_name'
    ];
}