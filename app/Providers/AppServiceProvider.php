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
            'App\Contracts\Repositories\BoxRepositoryInterface',
            'App\Repositories\Eloquent\BoxRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\UserRepositoryInterface',
            'App\Repositories\Eloquent\UserRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\BookmarkRepositoryInterface',
            'App\Repositories\Eloquent\BookmarkRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\CommentRepositoryInterface',
            'App\Repositories\Eloquent\CommentRepository'
        );

        $this->app->bind(
            'App\Contracts\Repositories\FavouriteRepositoryInterface',
            'App\Repositories\Eloquent\FavouriteRepository'
        );

        $this->app->singleton('elasticsearch', function() {
            // return \Elasticsearch\ClientBuilder::create()->build();
            return new \Elasticsearch\Client();
        });
    }

}
