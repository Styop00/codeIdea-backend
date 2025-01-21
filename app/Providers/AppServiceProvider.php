<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        App\Http\Contracts\ArticleRepositoryInterface::class,
        App\Http\Repositories\ArticleRepository::class
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Http\Contracts\ArticleRepositoryInterface::class, 
            \App\Http\Repositories\ArticleRepository::class,
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
