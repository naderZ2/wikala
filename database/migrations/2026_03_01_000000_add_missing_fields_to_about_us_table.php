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
            if (!Schema::hasColumn('about_us', 'facebook')) {
                $table->string('facebook')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'insta')) {
                $table->string('insta')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'youtube')) {
                $table->string('youtube')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'ads_time_user')) {
                $table->integer('ads_time_user')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'ads_time_business')) {
                $table->integer('ads_time_business')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'free_ads_user')) {
                $table->integer('free_ads_user')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'free_ads_business')) {
                $table->integer('free_ads_business')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'terms_ar')) {
                $table->text('terms_ar')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'terms_en')) {
                $table->text('terms_en')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'access_token')) {
                $table->string('access_token')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'instance_id')) {
                $table->string('instance_id')->nullable();
            }
            if (!Schema::hasColumn('about_us', 'image_limit')) {
                $table->integer('image_limit')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'facebook', 'insta', 'youtube', 'phone', 'email',
                'ads_time_user', 'ads_time_business', 'free_ads_user', 'free_ads_business',
                'terms_ar', 'terms_en', 'access_token', 'instance_id', 'image_limit'
            ]);
        });
    }
};
