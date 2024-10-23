<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_domain_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('domain_order_id');
            $table->unsignedBigInteger('domain_option_id');
            $table->boolean('dns_management')->default(false);
            $table->timestamp('active_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->string('domain_name');
            $table->integer('price')->default(0);
            $table->text('whois')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('domain_order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('domain_option_id')
                ->references('domain_option_id')
                ->on('domain_options')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_domain_details');
    }
};
