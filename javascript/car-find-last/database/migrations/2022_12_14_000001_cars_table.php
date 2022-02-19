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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand')->unique();
            $table->string('car_name');
            $table->integer('liter_baggage')->nullable();
            $table->boolean('4on4')->nullable();
            $table->boolean('crusie_control')->nullable();
            $table->boolean('reverse_camera')->nullable();
            $table->boolean('autonomous_braking')->nullable();
            $table->tinyInteger('type_of_car')->unsigned();
            $table->tinyInteger('price')->unsigned();
            $table->tinyInteger('model_of_car')->unsigned();
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
        Schema::dropIfExists('cars');
    }
};