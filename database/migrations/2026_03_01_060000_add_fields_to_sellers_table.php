<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('name');
            $table->string('shop_name_en')->nullable()->after('email');
            $table->string('shop_name_ar')->nullable()->after('shop_name_en');
            $table->string('banner')->nullable()->after('img_path');
        });
    }

    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['phone', 'shop_name_en', 'shop_name_ar', 'banner']);
        });
    }
};
