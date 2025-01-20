<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id'); // Primary key with the name article_id
            $table->string('title'); // Title of the article
            $table->text('content'); // Changed to text for longer content
            $table->string('author'); // Author's name
            $table->string('image')->nullable(); // Image field, nullable
            $table->integer('likes')->default(0); // Number of likes, default value 0
            $table->timestamps(); // Created_at and Updated_at timestamps
            $table->softDeletes();  // Add softDeletes for deleted_at column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
