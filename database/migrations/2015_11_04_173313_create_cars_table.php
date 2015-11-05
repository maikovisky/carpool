<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('distance');
            $table->string('source');
            $table->string('destination');
            $table->timestamps();
        });
        
        
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
            $table->tinyInteger('places')->unsigned()->default(5);   
            $table->integer('user_id')->unsigned()->index();            
            $table->integer('default_going_id')->unsigned()->index();
            $table->integer('default_come_back_id')->unsigned()->index();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('default_going_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('default_come_back_id')->references('id')->on('routes')->onDelete('cascade');
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
        Schema::drop('cars');
    }
}
