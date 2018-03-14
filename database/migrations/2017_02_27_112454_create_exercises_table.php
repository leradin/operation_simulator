<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('description',255)->nullable();
            $table->integer('stage_id')->unsigned();
            $table->dateTime('scheduled_date_time');
            $table->dateTime('supremed_date_time');
            $table->integer('user_id')->unsigned();
            $table->boolean('is_played')->default(false);
            $table->json('configuration_file')->nullable();
            $table->string('path_configuration_file',50)->nullable();
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
        Schema::drop('exercises');
    }
}
