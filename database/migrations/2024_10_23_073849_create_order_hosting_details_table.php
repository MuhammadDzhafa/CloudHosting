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
            $table->string('order_id');
            $table->unsignedBigInteger('hosting_plans_id');

            // Informasi Dasar
            $table->string('name', 100);
            $table->string('domain_name');
            $table->string('product_type', 50);
            $table->string('package_type', 50);

            // Spesifikasi Sumber Daya
            $table->string('max_bandwidth')->default('Unlimited');

            // Batasan Terkait Domain
            $table->string('max_domain')->default('Unlimited');
            $table->string('max_addon_domain')->default('Unlimited');
            $table->string('max_parked_domain')->default('Unlimited');

            // Batasan Sumber Daya Lainnya
            $table->string('max_email_account')->default('Unlimited');
            $table->string('max_database')->default('Unlimited');
            $table->integer('max_io')->default(0);
            $table->integer('nproc')->default(0);
            $table->integer('entry_process')->default(0);

            // Fitur
            $table->string('backup')->default('');
            $table->string('ssl')->default('');
            $table->string('ssh')->default('');
            $table->string('free_domain')->default('');

            // Tanggal dan Periode
            $table->date('active_date');
            $table->date('expired_date');
            $table->string('periode');

            // Penentuan Harga
            $table->integer('price')->default(0);

            $table->timestamps();
            $table->softDeletes();

            // Menambahkan Foreign Key Constraints
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');

            $table->foreign('hosting_plans_id')
                ->references('hosting_plans_id') // Mengacu pada hosting_plans_id di tabel hosting_plans
                ->on('hosting_plans')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_hosting_details');
    }
};
