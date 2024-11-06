<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_hosting_details', function (Blueprint $table) {
            $table->id('hosting_order_id');

            // Foreign Keys
            $table->string('order_id');  // Tipe data disesuaikan dengan kolom pada tabel orders
            $table->unsignedBigInteger('domain_option_id');  // Menghubungkan ke domain_options

            // Informasi Dasar
            $table->string('name', 100);  // Nama produk
            $table->string('domain_name');  // Nama domain terkait
            $table->string('product_type', 50);  // Jenis produk hosting (misalnya, shared, VPS)

            // Spesifikasi Sumber Daya
            $table->integer('RAM')->comment('in GB');  // Jumlah RAM dalam GB
            $table->integer('CPU')->comment('number of cores');  // Jumlah core CPU
            $table->integer('storage')->comment('in GB');  // Kapasitas penyimpanan dalam GB
            $table->integer('max_bandwidth')->comment('in GB/TB');  // Batas bandwidth

            // Batasan Terkait Domain
            $table->integer('max_domain');  // Jumlah domain yang dapat dihosting
            $table->integer('max_addon_domain');  // Jumlah addon domain yang dapat dihosting
            $table->integer('max_parked_domain');  // Jumlah parked domain yang dapat dihosting

            // Batasan Sumber Daya Lainnya
            $table->integer('max_email_account');  // Jumlah akun email yang dapat dibuat
            $table->integer('max_database');  // Jumlah database yang dapat dibuat
            $table->integer('max_io')->comment('IO usage limit');  // Batas penggunaan I/O
            $table->integer('nproc')->comment('Number of processes allowed');  // Jumlah proses yang diizinkan
            $table->integer('entry_process')->comment('Entry processes limit');  // Batas entry processes

            // Fitur
            $table->string('backup')->default('')->comment('Backup feature status');  // Status fitur backup
            $table->string('ssl')->default('')->comment('SSL feature status');  // Status fitur SSL

            // Tanggal dan Periode
            $table->date('active_date');  // Tanggal aktif hosting
            $table->date('expired_date');  // Tanggal kedaluwarsa hosting
            $table->integer('periode')->comment('in months');  // Periode dalam bulan

            // Penentuan Harga
            $table->integer('price')->default(0);  // Harga hosting dalam satuan integer

            $table->timestamps();
            $table->softDeletes();

            // Menambahkan Foreign Key Constraints
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');  // Menghapus hosting detail saat order dihapus

            $table->foreign('domain_option_id')
                ->references('domain_option_id')
                ->on('domain_options')
                ->onDelete('cascade');  // Menghapus hosting detail saat domain option dihapus
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_hosting_details');
    }
};
