<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->bigInteger('violator_id')->unsigned();
            $table->bigInteger('violation_id')->unsigned();
            $table->bigInteger('reporter_id')->unsigned();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->longText('cause')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('is_user_removed')->default(false);
            $table->dateTime('date_reported')->useCurrent();
            $table->dateTime('date_responded')->useCurrent();
            
            $table->foreign('violator_id')
                  ->references('user_id')->on('users');
            $table->foreign('violation_id')
                  ->references('violation_id')->on('violations');
            $table->foreign('reporter_id')
                  ->references('user_id')->on('users');
            $table->foreign('admin_id')
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
        Schema::dropIfExists('reports');
    }
}
