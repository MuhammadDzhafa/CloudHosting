<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegularMainSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regular_main_spec', function (Blueprint $table) {
            $table->id('regular_main_spec_id'); // ID kolom untuk primary key
            $table->unsignedBigInteger('hosting_plans_id'); // Foreign key for hosting plans
            $table->integer('RAM')->default(0);;
            $table->integer('storage')->default(0);;
            $table->integer('CPU')->default(0);;
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
        Schema::dropIfExists('regular_main_spec');
    }
}
