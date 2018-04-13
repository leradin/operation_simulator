<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_stage',function(Blueprint $table){
            $table->increments('id');
            $table->integer('computer_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->integer('cabin_id')->unsigned();
            //$table->integer('user_id')->unsigned()->nullable();
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
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
        Schema::drop('computer_stage');
    }
}
