<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\PresentationRepositoryInterface;

use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\PresentationPostgresRepository;
use App\Repositories\Implementations\ProductImagePostgresRepository;
use App\Repositories\Implementations\ProductPostgresRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthPostgresRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductPostgresRepository::class);
        $this->app->bind(ProductImageRepositoryInterface::class, ProductImagePostgresRepository::class);
        $this->app->bind(PresentationRepositoryInterface::class, PresentationPostgresRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
