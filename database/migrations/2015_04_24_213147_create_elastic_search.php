<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElasticSearch extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$this->elasticDown();

		$es    = \App::make('elasticsearch');

        $param = [];

        $param['index'] = \DB::connection()->getDatabaseName();
        $param['body']  = [];
        $param['body']['settings'] = \Config::get('search.settings');

        $param['body']['mappings'] = [];
        $param['body']['mappings']['movies'] = [];
        $param['body']['mappings']['movies']['properties'] = [
            'name' => [
                'type'              =>  'string',
                'index_analyzer'    =>  'nGram_analyzer',
                'search_analyzer'   =>  'whitespace_analyzer'
            ]
        ];

        // dd($param);

        $es->indices()->create($param);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$this->elasticDown();
	}

	public function elasticDown() {
		$es = \App::make('elasticsearch');

        try {
            $es->indices()->delete([
                'index' => \DB::connection()->getDatabaseName()
            ]);
        } catch (Exception $e) {
            return false;
        }
	}

}
