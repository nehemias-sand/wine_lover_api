<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ReviewRepositoryInterface;
use App\Services\AuthService;
use App\Services\CommentService;
use App\Services\ReviewService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
