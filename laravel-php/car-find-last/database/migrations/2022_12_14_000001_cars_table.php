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
            $table->string('brand')->nullable();
            $table->string('car_name')->nullable();
            $table->integer('liter_baggage')->nullable();
            $table->tinyInteger('four_on_four')->nullable();
            $table->tinyInteger('crusie_control')->nullable();
            $table->integer('number_of_seats')->nullable();
            $table->tinyInteger('type_of_car')->nullable();
            $table->tinyInteger('autonomous_braking')->nullable();
            $table->integer('car_pollution')->nullable();
            $table->integer('price')->nullable();
            $table->tinyInteger('reverse_camera')->nullable();
            $table->tinyInteger('model_of_car')->nullable();
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
        Schema::dropIfExists('cars');
    }
};