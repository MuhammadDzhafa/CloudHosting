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
            $table->string('order_id');
            $table->string('domain_name');
            $table->boolean('whois')->default(false);
            $table->boolean('dns_management')->default(false);
            $table->integer('price')->default(0);
            $table->timestamp('active_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Tambahkan kolom domain_order_id
            $table->unsignedBigInteger('domain_order_id')->nullable()->index();

            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_domain_details');
    }
}
