<?php

namespace App\Providers;

use App\Actions\Movies\Create\CreateMovieAction;
use App\Contracts\Movies\Create\CreateMovieContract;
use App\Models\Movie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateMovieContract::class, function ($app) {
            return new CreateMovieAction($app->make(Movie::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
