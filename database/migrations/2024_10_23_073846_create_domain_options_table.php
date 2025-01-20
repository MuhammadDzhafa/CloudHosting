<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domain_options', function (Blueprint $table) {
            $table->id('domain_option_id'); // Primary key kolom
            $table->string('domain_order_type'); // Kolom untuk jenis order domain
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domain_options'); // Menghapus tabel domain_options
    }
};
