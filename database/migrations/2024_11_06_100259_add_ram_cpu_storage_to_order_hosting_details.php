<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRamCpuStorageToOrderHostingDetails extends Migration
{
    public function up()
    {
        Schema::table('order_hosting_details', function (Blueprint $table) {
            $table->integer('ram')->after('package_type')->nullable();
            $table->integer('cpu')->after('ram')->nullable();
            $table->integer('storage')->after('cpu')->nullable();
        });
    }

    public function down()
    {
        Schema::table('order_hosting_details', function (Blueprint $table) {
            $table->dropColumn(['ram', 'cpu', 'storage']);
        });
    }
}