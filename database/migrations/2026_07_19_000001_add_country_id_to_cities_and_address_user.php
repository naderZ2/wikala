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
        Schema::table('cities', function (Blueprint $table) {
            if (!Schema::hasColumn('cities', 'country_id')) {
                $table->unsignedBigInteger('country_id')->nullable()->after('parent_id');
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'country_id')) {
                $table->unsignedBigInteger('country_id')->nullable()->after('region_id');
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            }
        });

        Schema::table('address_user', function (Blueprint $table) {
            if (Schema::hasColumn('address_user', 'country')) {
                $table->dropColumn('country');
            }
            if (!Schema::hasColumn('address_user', 'country_id')) {
                $table->unsignedBigInteger('country_id')->nullable()->after('region_id');
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_user', function (Blueprint $table) {
            if (Schema::hasColumn('address_user', 'country_id')) {
                $table->dropForeign(['country_id']);
                $table->dropColumn('country_id');
            }
            if (!Schema::hasColumn('address_user', 'country')) {
                $table->string('country')->nullable()->after('region_id');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'country_id')) {
                $table->dropForeign(['country_id']);
                $table->dropColumn('country_id');
            }
        });

        Schema::table('cities', function (Blueprint $table) {
            if (Schema::hasColumn('cities', 'country_id')) {
                $table->dropForeign(['country_id']);
                $table->dropColumn('country_id');
            }
        });
    }
};
