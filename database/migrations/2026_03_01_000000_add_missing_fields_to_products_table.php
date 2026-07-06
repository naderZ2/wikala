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
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('name_en');
            }
            if (!Schema::hasColumn('products', 'title_en')) {
                $table->string('title_en')->nullable()->after('title_ar');
            }
            if (!Schema::hasColumn('products', 'old_price')) {
                $table->string('old_price')->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'serving')) {
                $table->string('serving')->nullable()->after('main_image');
            }
            if (!Schema::hasColumn('products', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'title_en', 'old_price', 'serving']);
        });
    }
};
