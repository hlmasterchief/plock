<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function(Blueprint $table)
        {
            // user who follows someone
            $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');

            // user who are being followed
            $table->integer('follow_id')->unsigned();
            // $table->foreign('follow_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');

            $table->primary(['user_id', 'follow_id']);

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
        Schema::drop('followers');
    }

}
