<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('city_seller', function (Blueprint $table) {
            $table->integer('region_id')->nullable()->after('city_id');
            $table->decimal('delivery_price', 10, 2)->default(0)->after('seller_id');
            $table->boolean('active')->default(true)->after('delivery_price');
        });
    }

    public function down()
    {
        Schema::table('city_seller', function (Blueprint $table) {
            $table->dropColumn(['region_id', 'delivery_price', 'active']);
        });
    }
};
