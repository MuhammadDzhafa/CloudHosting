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
            $table->integer('min_RAM');
            $table->integer('max_RAM');
            $table->integer('multiplier_RAM');
            $table->integer('price_RAM');
            $table->integer('min_storage');
            $table->integer('max_storage');
            $table->integer('step_storage');
            $table->integer('price_storage');
            $table->integer('min_CPU');
            $table->integer('max_CPU');
            $table->integer('multiplier_CPU');
            $table->integer('price_CPU');
            $table->timestamps(); // Kolom created_at dan updated_at

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
