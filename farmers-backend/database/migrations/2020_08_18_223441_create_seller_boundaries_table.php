<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerBoundariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_boundaries', function (Blueprint $table) {
            $table->id('seller_boundary_id');
            $table->bigInteger('seller_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();

            $table->foreign('seller_id')
                  ->references('user_id')->on('users');
            $table->foreign('city_id')
                  ->references('city_id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_boundaries');
    }
}
