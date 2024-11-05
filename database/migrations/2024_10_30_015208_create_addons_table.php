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
            $table->unsignedBigInteger('domain_order_id')->nullable();

            // Foreign key ke order_domain_details
            $table->foreign('domain_order_id')
                ->references('domain_order_id')
                ->on('order_domain_details')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
