<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedisMovies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// $redis = \App::make('redis');
		// $es    = \App::make('elasticsearch');

		// $param = [];

		// $param['index'] = 'plock';
		// $param['type']  = 'movies';
		// $param['body']  = [];
		// $param['body']['movies'] = [];

		// $param['body']['movies']['properties'] = [
		// 	'title' => [
		// 		'type'				=>	'string',
		// 		'index_analyzer'	=>	'nGram_analyzer',
		// 		'search_analyzer'	=>	'whitespace_analyzer'
		// 	]
		// ];

		// $es->indices()->putMapping($param);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// $redis = \App::make('redis');
		// $es    = \App::make('elasticsearch');

		// $keys = $redis->keys('plock:movies:*');

		// foreach ($keys as $index => $key) {
		// 	$redis->del($key);
		// }

		// $es->indices()->deleteMapping(['index' => 'plock', 'type' => 'movies']);
	}

}