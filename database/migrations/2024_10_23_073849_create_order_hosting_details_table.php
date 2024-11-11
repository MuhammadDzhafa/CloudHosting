<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_hosting_details', function (Blueprint $table) {
            $table->id('hosting_order_id'); // Menetapkan hosting_order_id sebagai primary key
            $table->string('name')->default('default_name');
            $table->string('domain_name'); // Nama domain
            $table->string('product_type'); // Jenis produk
            $table->string('max_io'); // Max I/O
            $table->string('nproc'); // Jumlah proses
            $table->string('entry_process'); // Proses entri
            $table->string('ssl'); // SSL
            $table->string('ram'); // RAM
            $table->string('cpu'); // CPU
            $table->string('storage'); // Penyimpanan
            $table->string('backup'); // Backup
            $table->string('max_database'); // Max database
            $table->string('max_bandwidth'); // Max bandwidth
            $table->string('max_email_account'); // Max akun email
            $table->string('max_domain'); // Max domain
            $table->string('max_addon_domain'); // Max addon domain
            $table->string('max_parked_domain'); // Max parked domain
            $table->string('period')->default('monthly'); // Menambahkan nilai default 'monthly'
            $table->timestamp('active_date'); // Tanggal aktif
            $table->timestamp('expired_date'); // Tanggal kedaluwarsa
            $table->integer('price'); // Harga menggunakan integer
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_hosting_details');
    }
};
