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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->string('domain_web');
            $table->string('testimonial_text');
            $table->string('picture');
            $table->string('occupation');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps(); // Menambahkan created_at dan updated_at
            $table->softDeletes(); // Menambahkan kolom deleted_at untuk SoftDeletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
