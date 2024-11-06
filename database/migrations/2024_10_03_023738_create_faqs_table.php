<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id('faq_id'); // Primary key
            $table->string('question'); // Kolom untuk pertanyaan
            $table->text('answer'); // Kolom untuk jawaban
            $table->string('category'); // Kolom untuk kategori FAQ
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs'); // Menghapus tabel jika rollback
    }
};
