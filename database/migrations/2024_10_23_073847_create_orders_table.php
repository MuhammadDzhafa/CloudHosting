<?php

// 2024_10_23_073847_create_orders_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('status');
            $table->integer('total_price')->default(0);
            $table->integer('tax')->default(0);
            $table->string('payment_method');
            $table->timestamp('date_created');
            $table->unsignedBigInteger('billing_address_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('billing_address_id')
                ->references('billing_id')
                ->on('billing_addresses')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
