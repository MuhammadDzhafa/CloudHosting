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
        Schema::create('transfer_domains', function (Blueprint $table) {
            $table->id();
            $table->string('nama_domain');
            $table->integer('price');
            $table->string('epp_code');
            $table->timestamps();  // Akan menambahkan created_at dan updated_at dengan tipe timestamp
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_domains');
    }
};
