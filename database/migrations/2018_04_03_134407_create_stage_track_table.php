<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStageTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_track',function(Blueprint $table){
            $table->increments('id');
            $table->integer('stage_id')->unsigned();
            $table->integer('track_id')->unsigned();
            $table->foreign('stage_id')->references('id')->on('stages')
                ->onDelete('cascade');
            $table->foreign('track_id')->references('id')->on('tracks')
                ->onDelete('cascade');
            $table->float('course');
            $table->float('speed');
            $table->float('altitude');
            $table->string('init_position',50);
            $table->integer('object_type')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stage_track');
    }
}
