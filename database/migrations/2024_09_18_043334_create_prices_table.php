<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id('price_id'); // Auto-incrementing primary key
            $table->integer('price'); // Price field as integer
            $table->integer('discount')->nullable(); // Discount field as integer
            $table->integer('price_after'); // Price after discount as integer
            $table->unsignedBigInteger('hosting_plans_id'); // Foreign key for hosting plans
            $table->string('duration'); // Duration as string (not ENUM)
            $table->timestamps(); // Created at and updated at fields
            $table->softDeletes(); // Add deleted_at column for soft deletes

            // Foreign key constraint
            $table->foreign('hosting_plans_id')->references('hosting_plans_id')->on('hosting_plans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            $table->dropForeign(['hosting_plans_id']); // Drop foreign key
        });

        Schema::dropIfExists('prices'); // Drop prices table
    }
};
