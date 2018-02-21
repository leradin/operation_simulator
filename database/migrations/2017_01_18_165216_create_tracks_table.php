<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->enum('identity',['P','U','A','F','N','S','H','G','W','M','D','L','J','K']);
            $table->enum('battle_dimension',['P','A','G','S','U','F','X','Z']);
            $table->enum('status',['A','P','C','D','X','F']);
            $table->char('sidc',16);
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
        Schema::drop('tracks');
    }
}
