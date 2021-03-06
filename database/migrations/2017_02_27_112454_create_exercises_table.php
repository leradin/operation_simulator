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
            $table->longText('description')->nullable();
            $table->integer('stage_id')->unsigned();
            $table->dateTime('scheduled_date_time');
            $table->dateTime('supremed_date_time');
            $table->integer('user_id')->unsigned();
            $table->boolean('is_played')->default(false);
            $table->json('configuration_file')->nullable();
            $table->string('path_configuration_file',100)->nullable();
            $table->integer('number_of_times_played')->default(0);
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
