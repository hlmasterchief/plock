<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('favourite_id')->unsigned();
            // $table->primary('favourite_id');
            // $table->foreign('favourite_id')
            //       ->references('id')->on('favourites')
            //       ->onDelete('cascade');

            $table->text('genre');
            $table->text('country');
            $table->text('director');
            $table->text('plot');
            $table->integer('year');
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
        Schema::drop('movies');
    }

}
