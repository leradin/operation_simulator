<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_unit',function(Blueprint $table){
            $table->increments('id');
            $table->integer('sensor_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sensor_unit');
    }
}
