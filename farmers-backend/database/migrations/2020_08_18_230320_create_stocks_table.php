<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            
            $table->bigInteger('measurement_id')->unsigned();
            $table->bigInteger('season_id')->unsigned();
            $table->string('product_name');
            $table->date('date_start');
            $table->date('date_end');
            $table->double('value_start', 8, 2)->default(0);
            $table->double('value_end', 8, 2)->default(0);
            $table->bigInteger('inserted_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned();
            $table->timestamps();

            $table->foreign('measurement_id')
                  ->references('measurement_id')->on('measurements');
            $table->foreign('season_id')
                  ->references('season_id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
