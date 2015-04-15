<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedisPlock extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$redis = \App::make('redis');
		$es    = \App::make('elasticsearch');

		$param = [];

		$param['index'] = 'plock';
		$param['body']  = [];

		$param['body']['settings'] = \Config::get('search.settings');

		$es->indices()->create($param);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$redis = \App::make('redis');
		$es    = \App::make('elasticsearch');

		$keys = $redis->keys('plock:*');

		foreach ($keys as $index => $key) {
			$redis->del($key);
		}

		$es->indices()->delete(['index' => 'plock']);
	}

}
