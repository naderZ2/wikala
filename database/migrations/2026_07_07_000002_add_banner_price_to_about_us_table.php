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
            if (!Schema::hasColumn('about_us', 'banner_price')) {
                $table->decimal('banner_price', 10, 2)->default(10.00)->after('delivery_fee');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            if (Schema::hasColumn('about_us', 'banner_price')) {
                $table->dropColumn('banner_price');
            }
        });
    }
};
