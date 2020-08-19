<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_sellers', function (Blueprint $table) {
            $table->id('pending_seller_id');
            $table->string('email');
            $table->string('password');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birthday')->nullable();
            $table->string('seller_name', 100)->nullable();
            $table->string('req_valid_id')->nullable();
            $table->string('location')->nullable();

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
        Schema::dropIfExists('pending_sellers');
    }
}
