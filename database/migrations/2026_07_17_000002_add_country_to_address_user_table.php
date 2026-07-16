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
        Schema::table('address_user', function (Blueprint $table) {
            if (!Schema::hasColumn('address_user', 'country')) {
                $table->string('country')->nullable()->after('region_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_user', function (Blueprint $table) {
            if (Schema::hasColumn('address_user', 'country')) {
                $table->dropColumn('country');
            }
        });
    }
};
