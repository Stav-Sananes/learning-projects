<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up() {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->nullable();
            $table->string('bike_name')->nullable();
            $table->string('model_of_bike')->nullable();
            $table->string('engine_type')->nullable();
            $table->integer('cylinders')->nullable();        
            $table->integer('starter')->nullable();        
            $table->integer('price')->unsigned();
            $table->integer('transmission_type')->nullable();
            $table->tinyInteger('fuel_captacity')->unsigned();
            $table->tinyInteger('engine_stroke')->nullable();
            $table->tinyInteger('valves_per_cylinder')->nullable();
            $table->tinyInteger('cooling_system')->nullable();
            $table->string('picture_1')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('bikes');
    }
};