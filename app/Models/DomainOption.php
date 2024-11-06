<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DomainOption extends Model
{
    use HasFactory, SoftDeletes; // Menggunakan SoftDeletes trait

    protected $primaryKey = 'domain_option_id'; // Menentukan primary key

    protected $fillable = [
        'domain_order_type', // Kolom yang dapat diisi
    ];

    /**
     * Get the hosting details associated with the domain option.
     */
    public function hostingDetails()
    {
        return $this->hasMany(OrderHostingDetail::class, 'domain_option_id', 'domain_option_id');
    }
}
