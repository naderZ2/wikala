<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('group_id', 40)->nullable()->index()->after('order_number');
        });

        Schema::table('about_us', function (Blueprint $table) {
            if (!Schema::hasColumn('about_us', 'delivery_fee')) {
                $table->decimal('delivery_fee', 10, 2)->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['group_id']);
            $table->dropColumn('group_id');
        });

        Schema::table('about_us', function (Blueprint $table) {
            if (Schema::hasColumn('about_us', 'delivery_fee')) {
                $table->dropColumn('delivery_fee');
            }
        });
    }
};
