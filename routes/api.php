<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardTokenController;
use App\Http\Controllers\CashbackHistoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProductPresentationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('jwt')->get('/info', [AuthController::class, 'getUser']);
    Route::middleware('jwt')->post('logout', [AuthController::class, 'logout']);
});

Route::prefix('webhook')->group(function () {
    Route::post('/payment', [PaymentController::class, 'handlePayment']);
});

Route::prefix('public')->group(function () {

    Route::prefix('client')->group(function () {
        Route::post('/register', [ClientController::class, 'register']);
    });

    Route::prefix('catalogs')->group(function () {
        Route::get('/quality-product', [CatalogController::class, 'indexQualityProduct']);
        Route::get('/category-product', [CatalogController::class, 'indexCategoryProduct']);
        Route::get('/unit-measurement', [CatalogController::class, 'indexUnitMeasurement']);
        Route::get('/payment-status', [CatalogController::class, 'indexPayentStatus']);
        Route::get('/membership', [CatalogController::class, 'indexMembership']);
        Route::get('/membership/{id}', [CatalogController::class, 'showMembership']);
        Route::get('/profile', [CatalogController::class, 'indexProfile']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::get('/{productId}/images', [ProductImageController::class, 'index']);
        Route::get('/image/{id}', [ProductImageController::class, 'show']);
        Route::get('/{productId}/presentation/{presentationId}', [ProductPresentationController::class, 'show']);
        
    });

    Route::prefix('manufacturer')->group(function (){
        Route::get('/', [ManufacturerController::class, 'index']);
    });

    Route::prefix('presentation')->group(function () {
        Route::get('/', [PresentationController::class, 'index']);
        Route::get('/{id}', [PresentationController::class, 'show']);
    });

    Route::prefix('membership')->group(function () {
        Route::get('/plans', [PresentationController::class, 'index']);
    });
});


Route::middleware('jwt')->prefix('admin')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [AuthController::class, 'index']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::put('/{id}', [AuthController::class, 'update']);
        Route::put('/change-estado/{id}', [AuthController::class, 'changeState']);
    });

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

        Route::prefix('manufacturer')->group(function (){
            Route::middleware(['check.permission:CREATE_PRODUCT'])
            ->post('/', [ManufacturerController::class, 'store']);
            
        Route::middleware(['check.permission:UPDATE_PRODUCT'])
            ->put('/{id}', [ManufacturerController::class, 'update']);

        Route::middleware(['check.permission:DELETE_PRODUCT'])
            ->delete('/{id}', [ManufacturerController::class, 'delete']);
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

    Route::prefix('review')->group(function () {
        Route::middleware([])
            ->patch('/{id}', [ReviewController::class, 'changeState']);

        Route::middleware([])
            ->patch('/comment/{id}', [CommentController::class, 'changeState']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::put('/{id}', [OrderController::class, 'updateStatus']);
    });
});

Route::middleware('jwt')->prefix('client')->group(function () {

    Route::put('/update/{id}', [ClientController::class, 'update']);

    Route::get('/cashback', [CashbackHistoryController::class, 'indexClient']);

    Route::prefix('address')->group(function () {
        Route::middleware(['check.permission:CREATE_ADDRESS'])
            ->post('/', [AddressController::class, 'store']);

        Route::middleware(['check.permission:UPDATE_ADDRESS'])
            ->put('/{id}', [AddressController::class, 'update']);
    });

    Route::prefix('card')->group(function () {
        Route::middleware([])
            ->get('/token', [CardTokenController::class, 'indexClient']);

        Route::middleware([])
            ->post('/token', [CardTokenController::class, 'tokenizeCard']);

        Route::middleware([])
            ->put('/token/{id}', [CardTokenController::class, 'updateTokenizedCard']);

        Route::middleware([])
            ->delete('/token/{id}', [CardTokenController::class, 'deleteTokenizedCard']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'indexClient']);
        Route::get('/{id}', [OrderController::class, 'show']);
        Route::post('/', [OrderController::class, 'createOrder']);
    });

    Route::prefix('membership')->group(function () {
        Route::get('/', [MembershipController::class, 'current']);
        Route::post('/acquire', [MembershipController::class, 'acquire']);
        Route::post('/change/automatic-renewal', [MembershipController::class, 'changeAutomaticRenewal']);
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
            ->post('/{reviewId}/comment', [CommentController::class, 'store']);

        Route::middleware([])
            ->put('/comment/{id}', [CommentController::class, 'update']);

        Route::middleware([])
            ->delete('/comment/{id}', [CommentController::class, 'delete']);
    });
});
