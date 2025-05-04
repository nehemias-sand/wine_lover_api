<?php

namespace App\Providers;

use App\Repositories\AddressRepositoryInterface;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CategoryProductRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Repositories\ProductImageRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductPresentationRepositoryInterface;
use App\Repositories\PresentationRepositoryInterface;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\OrderItemRepositoryInterface;
use App\Repositories\OrderPaymentStatusRepositoryInterface;
use App\Repositories\ClientMembershipPlanRepositoryInterface;
use App\Repositories\MembershipRepositoryInterface;
use App\Repositories\PaymentStatusRepositoryInterface;
use App\Repositories\PlanRepositoryInterface;
use App\Repositories\QualityProductRepositoryInterface;
use App\Repositories\UnitMeasurementRepositoryInterface;

use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\CommentPostgresRepository;
use App\Repositories\Implementations\ReviewPostgresRepository;
use App\Repositories\Implementations\PresentationPostgresRepository;
use App\Repositories\Implementations\ProductImagePostgresRepository;
use App\Repositories\Implementations\ProductPostgresRepository;
use App\Repositories\Implementations\ProductPresentationPostgresRepository;
use App\Repositories\Implementations\AddressPostgresRepository;
use App\Repositories\Implementations\CategoryProductPostgresRepository;
use App\Repositories\Implementations\MembershipPostgresRepository;
use App\Repositories\Implementations\PaymentStatusPostgresRepository;
use App\Repositories\Implementations\PlanPostgresRepository;
use App\Repositories\Implementations\QualityProductPostgresRepository;
use App\Repositories\Implementations\UnitMeasurementPostgresRepository;
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
                $this->app->bind(ReviewRepositoryInterface::class, ReviewPostgresRepository::class);
                $this->app->bind(CommentRepositoryInterface::class, CommentPostgresRepository::class);
                $this->app->bind(ProductRepositoryInterface::class, ProductPostgresRepository::class);
                $this->app->bind(ProductImageRepositoryInterface::class, ProductImagePostgresRepository::class);
                $this->app->bind(ProductPresentationRepositoryInterface::class, ProductPresentationPostgresRepository::class);
                $this->app->bind(PresentationRepositoryInterface::class, PresentationPostgresRepository::class);
                $this->app->bind(ClientRepositoryInterface::class, ClientPostgresRepository::class);
                $this->app->bind(AddressRepositoryInterface::class, AddressPostgresRepository::class);
                $this->app->bind(QualityProductRepositoryInterface::class, QualityProductPostgresRepository::class);
                $this->app->bind(CategoryProductRepositoryInterface::class, CategoryProductPostgresRepository::class);
                $this->app->bind(UnitMeasurementRepositoryInterface::class, UnitMeasurementPostgresRepository::class);
                $this->app->bind(PaymentStatusRepositoryInterface::class, PaymentStatusPostgresRepository::class);
                $this->app->bind(MembershipRepositoryInterface::class, MembershipPostgresRepository::class);
                $this->app->bind(PlanRepositoryInterface::class, PlanPostgresRepository::class);
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
