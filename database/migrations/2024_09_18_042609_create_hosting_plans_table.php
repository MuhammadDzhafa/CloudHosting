<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hosting_plans', function (Blueprint $table) {
            $table->id('hosting_plans_id');
            $table->string('name');
            $table->unsignedBigInteger('group_id');
            $table->enum('type', ['Regular Hosting', 'Custom Hosting']);
            $table->string('description');
            $table->string('RAM');
            $table->string('storage');
            $table->string('CPU');
            $table->string('max_io');
            $table->string('nproc');
            $table->string('entry_process');
            $table->string('ssl');
            $table->string('backup');
            $table->string('max_database');
            $table->string('max_bandwidth');
            $table->string('max_email_account');
            $table->string('max_ftp_account');
            $table->string('max_domain');
            $table->string('max_addon_domain');
            $table->string('max_parked_domain');
            $table->string('ssh');
            $table->string('free_domain');
            $table->timestamps();


            // Menambahkan foreign key constraint
            $table->foreign('group_id')->references('hosting_group_id')->on('hosting_groups')->onDelete('cascade'); // Baris ini ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosting_plans');
    }
};
