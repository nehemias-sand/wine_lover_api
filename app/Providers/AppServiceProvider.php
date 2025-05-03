<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CategoryProductRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductPresentationRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\MembershipRepositoryInterface;
use App\Repositories\PaymentStatusRepositoryInterface;
use App\Repositories\PlanRepositoryInterface;
use App\Repositories\QualityProductRepositoryInterface;
use App\Repositories\UnitMeasurementRepositoryInterface;
use App\Services\AuthService;
use App\Services\CommentService;
use App\Services\ReviewService;
use App\Services\ProductImageService;
use App\Services\ProductPresentationService;
use App\Services\ProductService;
use App\Services\AddressService;
use App\Services\ClientService;
use App\Services\CatalogService;
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

        $this->app->bind(ReviewService::class, function ($app) {
            return new ReviewService($app->make(ReviewRepositoryInterface::class));
        });

        $this->app->bind(CommentService::class, function($app){
            return new CommentService($app->make(CommentRepositoryInterface::class));
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

        $this->app->bind(ProductPresentationService::class, function ($app) {
            return new ProductPresentationService(
                $app->make(ProductPresentationRepositoryInterface::class)
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

        $this->app->bind(CatalogService::class, function($app){
            return new CatalogService(
                $app->make(QualityProductRepositoryInterface::class),
                $app->make(CategoryProductRepositoryInterface::class),
                $app->make(UnitMeasurementRepositoryInterface::class),
                $app->make(PaymentStatusRepositoryInterface::class),
                $app->make(MembershipRepositoryInterface::class),
                $app->make(PlanRepositoryInterface::class)
            );
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
