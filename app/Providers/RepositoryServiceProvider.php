<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductPresentationRepositoryInterface;
use App\Repositories\PresentationRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;

use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\CommentPostgresRepository;
use App\Repositories\Implementations\ReviewPostgresRepository;
use App\Repositories\Implementations\PresentationPostgresRepository;
use App\Repositories\Implementations\ProductImagePostgresRepository;
use App\Repositories\Implementations\ProductPostgresRepository;
use App\Repositories\Implementations\ProductPresentationPostgresRepository;
use App\Repositories\Implementations\AddressPostgresRepository;
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
        $this->app->bind(ReviewRepositoryInterface::class, ReviewPostgresRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentPostgresRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductPostgresRepository::class);
        $this->app->bind(ProductImageRepositoryInterface::class, ProductImagePostgresRepository::class);
        $this->app->bind(ProductPresentationRepositoryInterface::class, ProductPresentationPostgresRepository::class);
        $this->app->bind(PresentationRepositoryInterface::class, PresentationPostgresRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientPostgreRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressPostgresRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
