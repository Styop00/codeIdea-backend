<?php

namespace App\Providers;

use App\Http\Contracts\PortfolioRepositoryInterface;
use App\Http\Repositories\PortfolioRepository;
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
        $this->app->singleton(
            PortfolioRepositoryInterface::class,
            PortfolioRepository::class,
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
