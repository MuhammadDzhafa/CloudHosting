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
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->enum('billing_cycle', ['monthly', 'yearly'])->default('monthly');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('order_id')->nullable(); // Ubah menjadi nullable()
            $table->timestamp('created_at')->useCurrent();

            // Tambahkan foreign key jika perlu
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
