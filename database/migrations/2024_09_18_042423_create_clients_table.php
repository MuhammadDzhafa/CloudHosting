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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('name');
            $table->string('picture');
            $table->string('occupation');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            // Menambahkan kolom created_at, updated_at, dan deleted_at
            $table->timestamps();  // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
