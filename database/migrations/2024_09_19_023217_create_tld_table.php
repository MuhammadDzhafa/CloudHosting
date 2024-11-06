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
        Schema::create('tld', function (Blueprint $table) {
            $table->id('tld_id'); // Primary key
            $table->string('tld_name'); // Nama TLD
            $table->integer('tld_price'); // Harga TLD
            $table->string('category'); // Kategori TLD
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tld'); // Menghapus tabel jika rollback
    }
};
