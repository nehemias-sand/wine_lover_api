<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\PresentationRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\OrderItemRepositoryInterface;
use App\Repositories\OrderPaymentStatusRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\PresentationPostgresRepository;
use App\Repositories\Implementations\ProductImagePostgresRepository;
use App\Repositories\Implementations\ProductPostgresRepository;
use App\Repositories\Implementations\AddressPostgresRepository;
use App\Repositories\Implementations\ClientPostgresRepository;
use App\Repositories\Implementations\OrderPostgresRepository;
use App\Repositories\Implementations\OrderItemPostgresRepository;
use App\Repositories\Implementations\OrderPaymentStatusPostgresRepository;
use App\Repositories\Implementations\ClientMembershipPlanPostgresRepository;
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
        $this->app->bind(ClientRepositoryInterface::class, ClientPostgresRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressPostgresRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderPostgresRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemPostgresRepository::class);
        $this->app->bind(OrderPaymentStatusRepositoryInterface::class, OrderPaymentStatusPostgresRepository::class);
        $this->app->bind(ClientMembershipPlanRepositoryInterface::class, ClientMembershipPlanPostgresRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
