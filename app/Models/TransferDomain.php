<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Impor SoftDeletes

class TransferDomain extends Model
{
    use HasFactory, SoftDeletes;  // Tambahkan SoftDeletes di sini

    // Tentukan nama tabel jika tidak sesuai dengan konvensi (opsional)
    protected $table = 'transfer_domains';

    // Tentukan kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'nama_domain',
        'price',
        'epp_code',
    ];

    // Jika Anda ingin menghindari timestamps otomatis
    // public $timestamps = false;
}
