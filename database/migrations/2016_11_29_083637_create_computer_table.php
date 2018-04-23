<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->ipAddress('ip_address');
            $table->macAddress('mac_address')->nullable();
            $table->string('label_arduino',10);
            $table->integer('cabin_id')->unsigned()->nullable();
            $table->foreign('cabin_id')->references('id')->on('cabins')->onDelete('cascade');
            $table->integer('computer_type_id')->unsigned();
            $table->foreign('computer_type_id')->references('id')->on('computer_types');
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
        Schema::drop('computers');
    }
}
