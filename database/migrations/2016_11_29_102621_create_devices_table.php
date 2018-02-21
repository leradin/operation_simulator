<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('description',100)->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->char('label')->nullable();
            $table->integer('computer_id')->unsigned()->nullable();
            $table->foreign('computer_id')->references('id')->on('computers');
            $table->integer('device_type_id')->unsigned();
            $table->foreign('device_type_id')->references('id')->on('device_types');
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
        Schema::drop('devices');
    }
}
