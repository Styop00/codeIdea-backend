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
        $this->app->singleton(
            \App\Http\Contracts\ArticleRepositoryInterface::class, 
            \App\Http\Repositories\ArticleRepository::class,
        );    
        
        $this->app->singleton(
            \App\Http\Contracts\UserRepositoryInterface::class, 
            \App\Http\Repositories\UserRepository::class,
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
