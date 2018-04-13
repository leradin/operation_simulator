<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeteorologicalPhenomenonStageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meteorological_phenomenon_stage',function(Blueprint $table){
            $table->increments('id');
            $table->integer('meteorological_id')->unsigned();
            $table->integer('stage_id')->unsigned();
            $table->foreign('stage_id')->references('id')->on('stages')
                ->onDelete('cascade');
            $table->foreign('meteorological_id')->references('id')->on('meteorological_phenomenons')
                ->onDelete('cascade');
            $table->integer('radio');
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
        Schema::drop('meteorological_phenomenon_stage');
    }
}
