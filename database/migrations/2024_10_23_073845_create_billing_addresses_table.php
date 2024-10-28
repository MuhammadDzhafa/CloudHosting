<?php
// 2024_10_23_073845_create_billing_addresses_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id('billing_id');
            $table->string('email');                    // Tambahkan ini
            $table->string('first_name');               // Tambahkan ini
            $table->string('last_name');                // Tambahkan ini
            $table->string('street_address_1');
            $table->string('street_address_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('post_code');
            $table->string('phone');                    // Tambahkan ini
            $table->string('company_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billing_addresses');
    }
};
