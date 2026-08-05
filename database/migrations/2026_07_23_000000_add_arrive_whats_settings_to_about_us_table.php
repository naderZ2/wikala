<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('arrive_whats_base_url')
                ->default('https://arrivewhats.com/api');
            $table->text('arrive_whats_token')->nullable();
            $table->string('arrive_whats_default_country_code', 10)->default('965');
            $table->string('arrive_whats_receipt_phone', 30)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'arrive_whats_base_url',
                'arrive_whats_token',
                'arrive_whats_default_country_code',
                'arrive_whats_receipt_phone',
            ]);
        });
    }
};
