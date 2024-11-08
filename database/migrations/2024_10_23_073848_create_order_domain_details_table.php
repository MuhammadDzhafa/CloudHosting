<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDomainDetailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('order_domain_details', function (Blueprint $table) {
            // Primary Key
            $table->id('domain_order_id'); // Sesuai dengan diagram, menggunakan domain_order_id sebagai primary key
            
            // Kolom-kolom sesuai diagram
            $table->string('domain_name');
            $table->boolean('whois');
            $table->boolean('dns_management');
            $table->integer('price'); // Menggunakan integer untuk price
            $table->timestamp('active_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            
            // Timestamps standar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_domain_details');
    }
}
