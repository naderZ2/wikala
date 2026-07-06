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
        Schema::table('banners', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->nullable()->after('category_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->boolean('is_paid')->default(0)->after('seller_id');
            $table->dateTime('start_date')->nullable()->after('is_paid');
            $table->dateTime('end_date')->nullable()->after('start_date');
            $table->text('payment_details')->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropColumn(['seller_id', 'is_paid', 'start_date', 'end_date', 'payment_details']);
        });
    }
};
