<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station')->unique();
            $table->string('name',50);
            $table->char('numeral',10);
            $table->char('country',3);           
            $table->char('serial_number',15);
            $table->string('image');
            $table->integer('number_engines')->default(1);
            $table->integer('unit_type_id')->unsigned()->nullable();
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
            $table->integer('sensor_id')->unsigned()->nullable();
            $table->foreign('sensor_id')->references('id')->on('sensors'); 
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
        Schema::drop('units');
    }
}
