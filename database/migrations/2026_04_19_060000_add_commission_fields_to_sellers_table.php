<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->enum('commission_type', ['percentage', 'fixed'])->default('percentage')->after('active');
            $table->decimal('commission_value', 8, 2)->default(0)->after('commission_type');
        });
    }

    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['commission_type', 'commission_value']);
        });
    }
};
