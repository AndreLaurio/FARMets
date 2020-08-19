<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            
            $table->bigInteger('seller_id')->unsigned();
            $table->string('product_name');
            $table->double('price', 8, 2)->default(0);
            $table->integer('total_stocks')->default(0);
            $table->integer('rem_stocks')->default(0);
            $table->integer('min_buyable_stocks')->default(0);
            $table->longText('description')->nullable();
            $table->string('product_img_path')->nullable();
            $table->string('location');
            $table->timestamps();

            $table->foreign('seller_id')
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
        Schema::dropIfExists('products');
    }
}
