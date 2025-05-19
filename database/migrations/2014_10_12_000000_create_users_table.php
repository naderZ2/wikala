<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->unsignedBigInteger('region_id')->nullable()->index();
            // $table->enum('gender',["male","female"])->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('device_id')->nullable();
            $table->string('lang',30)->nullable();
            $table->string('lat',30)->nullable();
            // $table->string('building_type',30)->nullable();
            // $table->string('floor_no',30)->nullable();
            // $table->string('flat_no',30)->nullable();
            // $table->string('building_no',30)->nullable();
            // $table->string('block_no',30)->nullable();
            // $table->string('street')->nullable();
            // $table->string('avenue')->nullable();
            // $table->text('notes')->nullable();
            // $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
