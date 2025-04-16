<?php

namespace App\Providers;

use App\Repositories\AuthRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\Implementations\AuthPostgresRepository;
use App\Repositories\Implementations\CommentPostgresRepository;
use App\Repositories\Implementations\ReviewPostgresRepository;
use App\Repositories\ReviewRepositoryInterface;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
