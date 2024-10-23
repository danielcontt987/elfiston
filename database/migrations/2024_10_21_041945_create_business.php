<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('sort_description')->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->double('price')->nullable();
            $table->integer('municipality_id')->nullable();
            $table->integer('category_id')->nullable();
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
        Schema::dropIfExists('business');
    }
}
