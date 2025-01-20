<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomMainSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_main_spec', function (Blueprint $table) {
            $table->id('custom_main_spec_id'); // ID kolom untuk primary key
            $table->unsignedBigInteger('hosting_plans_id'); // Foreign key for hosting plans
            $table->integer('min_RAM')->default(0);
            $table->integer('max_RAM')->default(0);
            $table->integer('multiplier_RAM')->default(0);
            $table->integer('price_RAM')->default(0);
            $table->integer('min_storage')->default(0);
            $table->integer('max_storage')->default(0);
            $table->integer('step_storage')->default(0);
            $table->integer('price_storage')->default(0);
            $table->integer('min_CPU')->default(0);
            $table->integer('max_CPU')->default(0);
            $table->integer('multiplier_CPU')->default(0);
            $table->integer('price_CPU')->default(0);
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan kolom deleted_at untuk soft deletes
            $table->softDeletes(); 

            $table->foreign('hosting_plans_id')->references('hosting_plans_id')->on('hosting_plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_main_spec');
    }
}
