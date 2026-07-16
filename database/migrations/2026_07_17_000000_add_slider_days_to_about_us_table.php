<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            if (!Schema::hasColumn('about_us', 'slider_days')) {
                $table->integer('slider_days')->default(7)->after('slider_price');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            if (Schema::hasColumn('about_us', 'slider_days')) {
                $table->dropColumn('slider_days');
            }
        });
    }
};
