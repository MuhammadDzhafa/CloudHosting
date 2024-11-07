<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDomainDetailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('order_domain_details', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name'); // Kolom nama domain
            $table->boolean('whois')->default(false); // Kolom untuk status WHOIS
            $table->boolean('dns_management')->default(false); // Kolom untuk status DNS management
            $table->integer('price')->default(0); // Harga domain
            $table->timestamp('active_date')->nullable(); // Tanggal aktif domain
            $table->timestamp('expired_date')->nullable(); // Tanggal kedaluwarsa domain
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Kolom deleted_at untuk soft delete

            // Menambahkan kolom domain_order_id yang mengacu ke domain_options
            $table->unsignedBigInteger('domain_order_id')->nullable()->index();

            // Menambahkan foreign key yang menghubungkan domain_order_id ke domain_options
            $table->foreign('domain_order_id')
                ->references('domain_option_id')
                ->on('domain_options')
                ->onDelete('set null'); // Mengatur agar kolom domain_order_id menjadi null jika domain_option dihapus
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_domain_details');
    }
}
