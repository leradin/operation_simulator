<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabin_stage',function(Blueprint $table){
            $table->increments('id');
            $table->integer('cabin_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->float('course');
            $table->float('speed');
            $table->float('altitude');
            $table->string('init_position',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cabin_stage');
    }
}
