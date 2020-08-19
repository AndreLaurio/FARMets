<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puchases', function (Blueprint $table) {
            $table->id('purchase_id');
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('buyer_id')->unsigned();
            $table->bigInteger('purchase_status_id')->unsigned();
            $table->integer('bought_stocks')->default(0);
            $table->double('price', 8, 2)->default(0);
            $table->double('payable', 8, 2)->deafult(0);
            $table->dateTime('date_purchased')->useCurrent();
            $table->dateTime('date_received')->useCurrent();

            $table->foreign('purchase_status_id')
                  ->references('purchase_status_id')->on('purchase_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puchases');
    }
}
