<?php

namespace App\Providers;

use App\Http\Contracts\PortfolioRepositoryInterface;
use App\Http\Repositories\PortfolioRepository;
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
            \App\Http\Contracts\CategoryRepositoryInterface::class,
            \App\Http\Repositories\CategoryRepository::class,
        );

        $this->app->singleton(
            PortfolioRepositoryInterface::class,
            PortfolioRepository::class,
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
