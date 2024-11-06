<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHostingDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'hosting_order_id';  // Menetapkan primary key

    protected $fillable = [
        'order_id',
        'domain_option_id',
        'name',
        'domain_name',
        'product_type',
        'RAM',
        'CPU',
        'storage',
        'max_bandwidth',
        'max_domain',
        'max_addon_domain',
        'max_parked_domain',
        'max_email_account',
        'max_database',
        'max_io',
        'nproc',
        'entry_process',
        'backup',
        'ssl',
        'active_date',
        'expired_date',
        'periode',
        'price',
    ];

    protected $casts = [
        'active_date' => 'date',
        'expired_date' => 'date',
        'price' => 'integer',
        'RAM' => 'integer',
        'CPU' => 'integer',
        'storage' => 'integer',
        'max_bandwidth' => 'integer',
        'max_domain' => 'integer',
        'max_addon_domain' => 'integer',
        'max_parked_domain' => 'integer',
        'max_email_account' => 'integer',
        'max_database' => 'integer',
        'max_io' => 'integer',
        'nproc' => 'integer',
        'entry_process' => 'integer',
        'periode' => 'integer',
    ];

    /**
     * Format harga menjadi format Rupiah.
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    /**
     * Format tanggal aktif menjadi format 'd F Y'.
     */
    public function getFormattedActiveDateAttribute(): string
    {
        return $this->active_date->format('d F Y');
    }

    /**
     * Format tanggal kadaluarsa menjadi format 'd F Y'.
     */
    public function getFormattedExpiredDateAttribute(): string
    {
        return $this->expired_date->format('d F Y');
    }

    /**
     * Relasi ke Order (One to Many).
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
        return $this->belongsTo(DomainOption::class, 'domain_option_id', 'domain_option_id');
    }
}
