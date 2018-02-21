<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->char('brand',25);
            $table->char('model',25);
            $table->enum('sensor_type', ['cinematico', 'tactico','sistema de armas']); // possible catalog
            $table->enum('sensor_scope', ['superficie', 'aereo','terrestre','submarino']); // possible catalog
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
        Schema::drop('sensors');
    }
}
