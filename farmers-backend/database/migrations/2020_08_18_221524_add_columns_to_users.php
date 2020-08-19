<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id', 'user_id');

            $table->bigInteger('user_type_id')->unsigned();
            $table->boolean('is_deactivated')->default(false);
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('birthday')->nullable();
            $table->integer('num_followers')->default(0);
            $table->integer('num_following')->default(0);

            $table->string('seller_name', 100)->nullable();
            $table->string('req_valid_id')->nullable();
            $table->string('location')->nullable();
            $table->double('rate')->default(0);
            $table->bigInteger('approved_by')->nullable();
            $table->dateTime('approved_date')->nullable();

            $table->foreign('user_type_id')
                  ->references('user_type_id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
