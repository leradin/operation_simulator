<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_stage',function(Blueprint $table){
            $table->increments('id');
            $table->integer('exercise_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->foreign('exercise_id')->references('id')->on('exercises')
                ->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exercise_stage');
    }
}
