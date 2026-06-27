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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_id')->nullable()->after('parent_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('set null');
            $table->string('payment_status')->default('pending')->after('plan_id');
            $table->text('payment_details')->nullable()->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropForeign(['plan_id']);
            $table->dropColumn(['plan_id', 'payment_status', 'payment_details']);
        });

        Schema::dropIfExists('plans');
    }
};
