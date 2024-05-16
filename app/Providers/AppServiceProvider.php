<?php

namespace App\Providers;

use App\Domain\Book\Repositories\BookEloquentORM;
use App\Domain\Book\Repositories\BookRepositoryInterface;
use App\Domain\Store\Repositories\StoreEloquentORM;
use App\Domain\Store\Repositories\StoreRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            BookRepositoryInterface::class,
            BookEloquentORM::class
        );

        $this->app->bind(
            StoreRepositoryInterface::class,
            StoreEloquentORM::class
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
