<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');
            $table->integer('favourite_id')->unsigned();
            // $table->foreign('favourite_id')
            //       ->references('id')->on('favourites')
            //       ->onDelete('cascade');
            $table->text('description');
            $table->integer('box_id')->unsigned()->default(0);
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
        Schema::drop('bookmarks');
    }

}
