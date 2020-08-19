<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_followers', function (Blueprint $table) {
            $table->id('user_follower_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('follower_id')->unsigned();
            $table->dateTime('date_followed')->useCurrent();
            
            $table->foreign('user_id')
                  ->references('user_id')->on('users');
            $table->foreign('follower_id')
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
        Schema::dropIfExists('user_followers');
    }
}
