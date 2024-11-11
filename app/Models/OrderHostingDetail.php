<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHostingDetail extends Model
{
    use HasFactory, SoftDeletes;

    // Menetapkan hosting_order_id sebagai primary key
    protected $primaryKey = 'hosting_order_id';

    // Menetapkan apakah kolom hosting_order_id akan auto increment
    public $incrementing = true;

    // Tentukan tipe data untuk primary key jika bukan integer
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'domain_name',
        'product_type',
        'ram',
        'cpu',
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
        'period',
        'price',
    ];    
    
    protected $casts = [
        'active_date' => 'date',
        'expired_date' => 'date',
        'price' => 'integer',
        'max_io' => 'integer',
        'nproc' => 'integer',
        'entry_process' => 'integer',
        'period' => 'string',
        'ram' => 'string',
        'cpu' => 'string',
        'storage' => 'string',
        'max_bandwidth' => 'string',
        'max_domain' => 'string',
        'max_addon_domain' => 'string',
        'max_parked_domain' => 'string',
        'max_email_account' => 'string',
        'max_database' => 'string',
        'backup' => 'string',
        'ssl' => 'string',
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

}
