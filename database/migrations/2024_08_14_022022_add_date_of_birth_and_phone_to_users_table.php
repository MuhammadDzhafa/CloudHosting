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
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'date_of_birth' dari sini
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kembali kolom 'date_of_birth' jika rollback
            $table->dropColumn('date_of_birth');
            $table->dropColumn('phone');
        });
    }
};
