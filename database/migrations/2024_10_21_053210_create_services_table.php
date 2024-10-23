<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->nullable();
            $table->integer('user_id');
            //Mesero
            $table->string('experience')->nullable();
            $table->string('skills')->nullable();
            $table->string('additional_waiters')->nullable();
            $table->integer('hour_work')->nullable();
            $table->boolean('is_waiter')->default(false);
            //Cocina
            $table->enum('local_type', ['Urbano', 'Campestre'])->default('Urbano');
            $table->integer('service_include')->nullable();
            $table->boolean('is_kitchen')->default(false);
            $table->boolean('is_waiter_kitchen')->default(false);
            $table->integer('qty_waiter')->nullable();
            $table->boolean('is_banquets')->default(false);
            $table->string('banquet_include')->nullable();
            $table->boolean('is_drink_open')->default(false);
            $table->string('drink_open')->nullable();
            $table->boolean('is_dance_floor')->default(false);
            $table->boolean('is_waiting_room')->default(false);
            $table->boolean('is_bricolin')->default(false);
            $table->string('bricolin_c')->nullable();
            $table->boolean('is_children_area')->default(false);
            $table->string('children_area_c')->nullable();
            $table->boolean('is_green_area')->default(false);
            $table->string('kitchen_c')->nullable();
            //Musica
            $table->boolean('is_music')->default(false);
            //Musica Y Alimentos
            $table->boolean('is_others')->default(false);
            $table->boolean('is_food')->default(false);
            $table->string('description')->nullable();
            $table->string('extras')->nullable();
            $table->double('price')->default(0);
            $table->double('extra_price')->default(0);
            $table->string('images')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
