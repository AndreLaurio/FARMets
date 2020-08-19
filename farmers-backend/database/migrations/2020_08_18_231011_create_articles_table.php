<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id');
            $table->bigInteger('author_id')->unsigned();
            $table->string('title');
            $table->longText('body');
            $table->dateTime('date_published')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->dateTime('updated_on')->useCurrent();

            $table->foreign('author_id')
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
        Schema::dropIfExists('articles');
    }
}
