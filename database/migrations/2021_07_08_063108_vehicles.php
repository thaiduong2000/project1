<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('vehicles', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->integer('technology_id')->unsigned()->index();
    //         $table->foreign('technology_id')->references('id')->on('technologies');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
