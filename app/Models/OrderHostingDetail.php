<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHostingDetail extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'hosting_order_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
     * Get the formatted price.
     *
     * @return string
     */
    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    /**
     * Get the formatted active date.
     *
     * @return string
     */
    public function getFormattedActiveDateAttribute(): string
    {
        return $this->active_date->format('d F Y');
    }

    /**
     * Get the formatted expired date.
     *
     * @return string
     */
    public function getFormattedExpiredDateAttribute(): string
    {
        return $this->expired_date->format('d F Y');
    }

    /**
     * Get the order that owns the hosting detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Get the domain option that owns the hosting detail.
     */
    public function domainOption()
    {
        return $this->belongsTo(DomainOption::class, 'domain_option_id', 'domain_option_id');
    }
}
