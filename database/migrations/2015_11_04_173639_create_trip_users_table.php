<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('confirmed');
            $table->boolean('driver');
            $table->boolean('ride');
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('default_trip_users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('driver');
            $table->boolean('ride');
            $table->integer('round_trip');
            $table->integer('car_id')->unsigned()->index();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('trip_users');
    }
}
