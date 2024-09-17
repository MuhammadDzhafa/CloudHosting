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
        Schema::table('users', function (Blueprint $table) {
            // Add 'phone' column, no need to drop 'date_of_birth' for SQLite
            if (Schema::hasColumn('users', 'date_of_birth')) {
                if (config('database.default') !== 'sqlite') {
                    // Only attempt to drop column if not using SQLite
                    $table->dropColumn('date_of_birth');
                }
            }
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->date('date_of_birth')->nullable();
        });
    }
};
