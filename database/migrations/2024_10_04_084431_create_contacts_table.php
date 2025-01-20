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
        if (!Schema::hasTable('contact_us')) {
            Schema::create('contact_us', function (Blueprint $table) {
                $table->id('contact_us_id');
                $table->string('name');
                $table->string('email');
                $table->text('message');
                $table->timestamps();
                $table->softDeletes();  // Menambahkan kolom deleted_at untuk soft deletes
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');  // Pastikan nama tabelnya benar
    }
};
