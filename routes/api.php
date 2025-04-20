<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductPresentationController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('jwt')->post('logout', [AuthController::class, 'logout']);
});

Route::prefix('public')->group(function () {

    Route::prefix('client')->group(function () {
        Route::post('/register', [ClientController::class, 'registerClient']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::get('/{productId}/images', [ProductImageController::class, 'index']);
        Route::get('/image/{id}', [ProductImageController::class, 'show']);
        Route::get('/{productId}/presentation/{presentationId}', [ProductPresentationController::class, 'show']);
    });

    Route::prefix('presentation')->group(function () {
        Route::get('/', [PresentationController::class, 'index']);
        Route::get('/{id}', [PresentationController::class, 'show']);
    });
});


Route::middleware('jwt')->prefix('admin')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);

    Route::prefix('product')->group(function () {
        Route::middleware(['check.permission:CREATE_PRODUCT'])
            ->post('/', [ProductController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_PRODUCT'])
            ->put('/{id}', [ProductController::class, 'update']);

        Route::middleware(['check.permission:DELETE_PRODUCT'])
            ->delete('/{id}', [ProductController::class, 'delete']);

        Route::middleware(['check.permission:CREATE_PRODUCT'])
            ->post('/presentation', [ProductPresentationController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_PRODUCT'])
            ->put('/{productId}/presentation/{presentationId}', [ProductPresentationController::class, 'update']);

        Route::middleware(['check.permission:DELETE_PRODUCT'])
            ->delete('/{productId}/presentation/{presentationId}', [ProductPresentationController::class, 'delete']);

        Route::prefix('image')->group(function () {
            Route::middleware(['check.permission:CREATE_PRODUCT'])
                ->post('/', [ProductImageController::class, 'store']);

            Route::middleware(['check.permission:UPDATE_PRODUCT'])
                ->patch('/{id}/change-state', [ProductImageController::class, 'changeState']);

            Route::middleware(['check.permission:DELETE_PRODUCT'])
                ->delete('/{id}', [ProductImageController::class, 'delete']);
        });
    });

    Route::prefix('presentation')->group(function () {
        Route::middleware(['check.permission:CREATE_PRODUCT'])
            ->post('/', [PresentationController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_PRODUCT'])
            ->put('/{id}', [PresentationController::class, 'update']);

        Route::middleware(['check.permission:DELETE_PRODUCT'])
            ->delete('/{id}', [PresentationController::class, 'delete']);
    });
});

Route::middleware('jwt')->prefix('client')->group(function () {

    Route::put('/update/{id}', [ClientController::class, 'update']);

    Route::prefix('address')->group(function () {
        Route::middleware(['check.permission:CREATE_ADDRESS'])
            ->post('/', [AddressController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_ADDRESS'])
            ->put('/{id}', [AddressController::class, 'update']);
    });

    Route::prefix('review')->group(function () {
        Route::middleware(['check.permission:GET_REVIEWS'])
            ->get('/', [ReviewController::class, 'index']);

        Route::middleware(['check.permission:CREATE_REVIEW'])
            ->post('/', [ReviewController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_REVIEW'])
            ->post('/{id}', [ReviewController::class, 'update']);

        Route::middleware(['check.permission:DELETE_REVIEW'])
            ->delete('/{id}', [ReviewController::class, 'delete']);

        Route::middleware(['check.permission:GET_REVIEW_COMMETS'])
            ->get('/{reviewId}/comment', [CommentController::class, 'index']);

        Route::middleware([])
            ->post('/comment', [CommentController::class, 'store']);

        Route::middleware([])
            ->put('/comment/{id}', [CommentController::class, 'update']);

        Route::middleware([])
            ->delete('/comment/{id}', [CommentController::class, 'delete']);
    });
});
