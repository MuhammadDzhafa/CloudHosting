<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDomainDetailsTable extends Migration
{
    public function up(): void
    {
        Schema::create('order_domain_details', function (Blueprint $table) {
            $table->id('domain_order_id'); // Primary Key
            $table->string('domain_name');
            $table->boolean('whois');
            $table->boolean('dns_management');
            $table->integer('price');
            $table->timestamp('active_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->timestamps(); // Timestamps created_at dan updated_at
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_domain_details');
    }
}
