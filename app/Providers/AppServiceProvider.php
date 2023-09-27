<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\BookRepositoryInterface',
            'App\Repositories\BookRepository'
        );

        $this->app->bind(
            'App\Interfaces\AuthorRepositoryInterface',
            'App\Repositories\AuthorRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
