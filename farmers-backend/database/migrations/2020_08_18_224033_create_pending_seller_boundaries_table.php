<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingSellerBoundariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_seller_boundaries', function (Blueprint $table) {
            $table->id('pending_seller_boundary_id');
            $table->bigInteger('pending_seller_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();

            $table->foreign('pending_seller_id')
                  ->references('pending_seller_id')->on('pending_sellers');
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
        Schema::dropIfExists('pending_seller_boundaries');
    }
}
