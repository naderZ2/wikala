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
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('ads_limit')->default(0)->after('price'); // 0 means unlimited
        });

        Schema::table('sellers', function (Blueprint $table) {
            $table->timestamp('plan_starts_at')->nullable()->after('payment_details');
            $table->timestamp('plan_ends_at')->nullable()->after('plan_starts_at');
        });

        Schema::create('seller_subscription_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('pending'); // pending, paid, failed
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_subscription_payments');

        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['plan_starts_at', 'plan_ends_at']);
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('ads_limit');
        });
    }
};
