<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'App\Contracts\Repositories\UserRepositoryInterface',
			'App\Repositories\Eloquent\UserRepository'
		);

		$this->app->singleton('elasticsearch', function() {
			// return \Elasticsearch\ClientBuilder::create()->build();
			return new \Elasticsearch\Client();
		});
	}

}
