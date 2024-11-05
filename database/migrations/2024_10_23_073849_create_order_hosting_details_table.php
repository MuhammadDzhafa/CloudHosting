<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_hosting_details', function (Blueprint $table) {
            $table->id('hosting_order_id');

            // Foreign Keys
            $table->string('order_id');  // Sesuaikan tipe data
            $table->unsignedBigInteger('domain_option_id');

            // Basic Information
            $table->string('name', 100);
            $table->string('domain_name');
            $table->string('product_type', 50);

            // Resource Specifications
            $table->integer('RAM')->comment('in GB');
            $table->integer('CPU')->comment('number of cores');
            $table->integer('storage')->comment('in GB');
            $table->integer('max_bandwidth')->comment('in GB/TB');

            // Domain Related Limits
            $table->integer('max_domain');
            $table->integer('max_addon_domain');
            $table->integer('max_parked_domain');

            // Other Resource Limits
            $table->integer('max_email_account');
            $table->integer('max_database');
            $table->integer('max_io')->comment('IO usage limit');
            $table->integer('nproc')->comment('Number of processes allowed');
            $table->integer('entry_process')->comment('Entry processes limit');

            // Features
            $table->string('backup')->default('')->comment('Backup feature status');
            $table->string('ssl')->default('')->comment('SSL feature status');

            // Dates and Period
            $table->date('active_date');
            $table->date('expired_date');
            $table->integer('periode')->comment('in months');

            // Pricing
            $table->integer('price')->default(0);

            $table->timestamps();
            $table->softDeletes();

            // Foreign Key Constraints
            $table->foreign('order_id')
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
        Schema::dropIfExists('order_hosting_details');
    }
};
