<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;

use App\Services\AuthService;
use App\Services\ProductImageService;
use App\Services\ProductService;
use App\Services\AddressService;
use App\Services\ClientService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(AuthRepositoryInterface::class));
        });

        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService(
                $app->make(ProductRepositoryInterface::class),
                $app->make(ProductImageRepositoryInterface::class)
            );
        });

        $this->app->bind(ProductImageService::class, function ($app) {
            return new ProductImageService(
                $app->make(ProductRepositoryInterface::class),
                $app->make(ProductImageRepositoryInterface::class)
            );
        });
        
        $this->app->bind(ProductImageService::class, function ($app) {
            return new ProductImageService(
                $app->make(ProductRepositoryInterface::class),
                $app->make(ProductImageRepositoryInterface::class)
            );
        });

        $this->app->bind(ClientService::class, function ($app) {
            return new ClientService(
                $app->make(ClientRepositoryInterface::class),
                $app->make(AddressRepositoryInterface::class)
            );
        });

        $this->app->bind(AddressService::class, function ($app) {
            return new AddressService($app->make(AddressRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
