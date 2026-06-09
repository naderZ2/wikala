<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'icarry_order_id')) {
                $table->string('icarry_order_id')->nullable()->after('bill_url');
            }
            if (!Schema::hasColumn('orders', 'icarry_tracking_number')) {
                $table->string('icarry_tracking_number')->nullable()->index()->after('icarry_order_id');
            }
            if (!Schema::hasColumn('orders', 'icarry_shipment_status')) {
                $table->string('icarry_shipment_status')->nullable()->after('icarry_tracking_number');
            }
            if (!Schema::hasColumn('orders', 'icarry_driver_id')) {
                $table->string('icarry_driver_id')->nullable()->after('icarry_shipment_status');
            }
            if (!Schema::hasColumn('orders', 'icarry_driver_lat')) {
                $table->decimal('icarry_driver_lat', 10, 7)->nullable()->after('icarry_driver_id');
            }
            if (!Schema::hasColumn('orders', 'icarry_driver_lng')) {
                $table->decimal('icarry_driver_lng', 10, 7)->nullable()->after('icarry_driver_lat');
            }
            if (!Schema::hasColumn('orders', 'icarry_tracking_data')) {
                $table->text('icarry_tracking_data')->nullable()->after('icarry_driver_lng');
            }
            if (!Schema::hasColumn('orders', 'icarry_synced_at')) {
                $table->timestamp('icarry_synced_at')->nullable()->after('icarry_tracking_data');
            }
        });

        Schema::table('sellers', function (Blueprint $table) {
            if (!Schema::hasColumn('sellers', 'icarry_warehouse_name')) {
                $table->string('icarry_warehouse_name')->nullable()->after('commission_value');
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach ([
                'icarry_order_id',
                'icarry_tracking_number',
                'icarry_shipment_status',
                'icarry_driver_id',
                'icarry_driver_lat',
                'icarry_driver_lng',
                'icarry_tracking_data',
                'icarry_synced_at',
            ] as $column) {
                if (Schema::hasColumn('orders', $column)) {
                    if ($column === 'icarry_tracking_number') {
                        $table->dropIndex(['icarry_tracking_number']);
                    }
                    $table->dropColumn($column);
                }
            }
        });

        Schema::table('sellers', function (Blueprint $table) {
            if (Schema::hasColumn('sellers', 'icarry_warehouse_name')) {
                $table->dropColumn('icarry_warehouse_name');
            }
        });
    }
};
