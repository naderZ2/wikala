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
        \Illuminate\Support\Facades\DB::table('roles')->where('guard_name', 'web')->update(['guard_name' => 'admin']);
        \Illuminate\Support\Facades\DB::table('permissions')->where('guard_name', 'web')->update(['guard_name' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('roles')->where('guard_name', 'admin')->update(['guard_name' => 'web']);
        \Illuminate\Support\Facades\DB::table('permissions')->where('guard_name', 'admin')->update(['guard_name' => 'web']);
    }
};
