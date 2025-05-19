<?php

namespace App\Providers;

use App\Models\Manufacturer;
use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CardTokenRepositoryInterface;
use App\Repositories\CashbackHistoryRepositoryInterface;
use App\Repositories\CategoryProductRepositoryInterface;
use App\Repositories\ClientMembershipPaymentStatusRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductPresentationRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\ManufacturerRepositoryInterface;
use App\Repositories\MembershipRepositoryInterface;
use App\Repositories\PaymentStatusRepositoryInterface;
use App\Repositories\PlanRepositoryInterface;
use App\Repositories\QualityProductRepositoryInterface;
use App\Repositories\UnitMeasurementRepositoryInterface;
use App\Repositories\OrderItemRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\MembershipPlanRepositoryInterface;
use App\Repositories\OrderPaymentStatusRepositoryInterface;
use App\Repositories\ProfileRepositoryInterface;
use App\Services\AuthService;
use App\Services\CommentService;
use App\Services\ReviewService;
use App\Services\ProductImageService;
use App\Services\ProductPresentationService;
use App\Services\ProductService;
use App\Services\AddressService;
use App\Services\CardTokenService;
use App\Services\ClientMembershipService;
use App\Services\ClientService;
use App\Services\CatalogService;
use App\Services\ManufacturerService;
use App\Services\OrderService;
use App\Services\PaymentService;
use App\Services\RsaEncryptionService;
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

        $this->app->bind(CommentService::class, function ($app) {
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

        $this->app->bind(RsaEncryptionService::class, function ($app) {
            return new RsaEncryptionService();
        });

        $this->app->bind(CardTokenService::class, function ($app) {
            return new CardTokenService(
                $app->make(CardTokenRepositoryInterface::class),
                $app->make(RsaEncryptionService::class),
            );
        });

        $this->app->bind(CatalogService::class, function ($app) {
            return new CatalogService(
                $app->make(QualityProductRepositoryInterface::class),
                $app->make(CategoryProductRepositoryInterface::class),
                $app->make(UnitMeasurementRepositoryInterface::class),
                $app->make(PaymentStatusRepositoryInterface::class),
                $app->make(MembershipRepositoryInterface::class),
                $app->make(PlanRepositoryInterface::class),
                $app->make(ProfileRepositoryInterface::class),
            );
        });

        $this->app->bind(PaymentService::class, function ($app) {
            return new PaymentService(
                $app->make(ClientMembershipPaymentStatusRepositoryInterface::class),
                $app->make(OrderPaymentStatusRepositoryInterface::class),
            );
        });

        $this->app->bind(ClientMembershipService::class, function ($app) {
            return new ClientMembershipService(
                $app->make(PaymentService::class),
                $app->make(AddressRepositoryInterface::class),
                $app->make(CardTokenRepositoryInterface::class),
                $app->make(MembershipPlanRepositoryInterface::class),
                $app->make(ClientMembershipPlanRepositoryInterface::class),
                $app->make(ClientMembershipPaymentStatusRepositoryInterface::class),
                $app->make(CashbackHistoryRepositoryInterface::class),
            );
        });

        $this->app->bind(OrderService::class, function ($app) {
            return new OrderService(
                $app->make(PaymentService::class),
                $app->make(AddressRepositoryInterface::class),
                $app->make(OrderRepositoryInterface::class),
                $app->make(OrderItemRepositoryInterface::class),
                $app->make(OrderPaymentStatusRepositoryInterface::class),
                $app->make(ProductPresentationRepositoryInterface::class),
                $app->make(ClientMembershipPlanRepositoryInterface::class),
                $app->make(CashbackHistoryRepositoryInterface::class),
                $app->make(CardTokenRepositoryInterface::class),
            );
        });

        $this->app->bind(ManufacturerService::class, function($app){
            return new ManufacturerService($app->make(ManufacturerRepositoryInterface::class));
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
