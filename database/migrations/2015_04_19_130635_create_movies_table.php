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
            $table->integer('favourite_id')->unsigned();
            $table->primary('favourite_id');
            $table->foreign('favourite_id')
                  ->references('id')->on('favourites')
                  ->onDelete('cascade');

            $table->text('plot');
            $table->date('release_date');
            $table->timestamps();
        });

        $this->upElastic();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movies');

        $this->downElastic();
    }

    public function upElastic() {
        $es    = \App::make('elasticsearch');

        $param = [];

        $param['index'] = \DB::connection()->getDatabaseName();
        $param['body']  = [];
        $param['body']['movies'] = [];

        $param['body']['movies']['properties'] = [
            'name' => [
                'type'              =>  'string',
                'index_analyzer'    =>  'nGram_analyzer',
                'search_analyzer'   =>  'whitespace_analyzer'
            ]
        ];

        $es->indices()->create($param);
    }

    public function downElastic() {
        $es = \App::make('elasticsearch');

        try {
            $es->indices()->deleteMapping([
                'index' => \DB::connection()->getDatabaseName(),
                'type'  => 'movies'
            ]);
        } catch (Exception $e) {
            return false;
        }
    }

}
