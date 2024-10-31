<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->boolean('daily_backup')->default(false);
            $table->timestamp('active_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->boolean('email_protection')->default(false);
            $table->integer('price')->default(0);
            $table->string('order_id')->nullable(); // Ubah ke string karena order_id adalah string

            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
