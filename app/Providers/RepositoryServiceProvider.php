<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\Implementations\AddressPostgresRepository;
use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\ClientPostgreRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthPostgresRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientPostgreRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressPostgresRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
