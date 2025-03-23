<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp_number')->default('0111111');
            $table->text('description')->default('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate laboriosam ut aperiam ea veniam animi dolores ex porro, tempora enim magnam placeat officia corporis provident modi eaque dolorum cupiditate excepturi!');
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
        Schema::dropIfExists('about_us');
    }
};
