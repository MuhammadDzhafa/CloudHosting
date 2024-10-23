<?php
// 2024_10_23_073846_create_domain_options_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domain_options', function (Blueprint $table) {
            $table->id('domain_option_id');
            $table->string('domain_order_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domain_options');
    }
};