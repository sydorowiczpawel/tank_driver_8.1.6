<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departure_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pass_number');
            $table->foreign('pass_number')->references('pass_number')->on('users');
            $table->string('tank_number');
            $table->foreign('tank_number')->references('tank_number')->on('tanks');
            $table->string('series')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('odometer_start');
            $table->double('odometer_end')->nullable();
            $table->double('goh_start');
            $table->double('goh_end')->nullable();
            $table->double('wh_start');
            $table->double('wh_end')->nullable();
            $table->integer('heater_min')->nullable();
            $table->integer('7,62')->nullable();
            $table->integer('12,7')->nullable();
            $table->integer('125')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departure_orders');
    }
};