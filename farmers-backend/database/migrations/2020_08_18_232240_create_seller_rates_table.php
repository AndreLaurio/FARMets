<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_rates', function (Blueprint $table) {
            $table->id('seller_rate_id');
            $table->bigInteger('seller_id')->unsigned();
            $table->bigInteger('rater_id')->unsigned();
            $table->integer('rate')->default(0);
            $table->dateTime('date_rated')->useCurrent();

            $table->foreign('seller_id')
                  ->references('user_id')->on('users');
            $table->foreign('rater_id')
                  ->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_rates');
    }
}
