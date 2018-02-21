<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabins', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('name',25);
            $table->ipAddress('ip_address_arduino');
            $table->macAddress('mac_address_arduino');
            $table->ipAddress('ip_address_camera');
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
        Schema::drop('cabins');
    }
}
