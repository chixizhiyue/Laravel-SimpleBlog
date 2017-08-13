<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('title');
            $table->longText('post');
            $table->longText('description');
            $table->string('img');
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('cat')->references('id')->on('categorys');
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
        //
    }
}
