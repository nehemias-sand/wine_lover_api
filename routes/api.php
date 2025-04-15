<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('jwt')->post('logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::put('/update-client/{id}', [ClientController::class, 'update']);

Route::prefix('admin')->group(function () {
    Route::middleware(['jwt', 'check.permission:CREATE_PRODUCT'])->post('/products', function () {
        return response()->json(['message' => 'Producto creado']);
    });
});

Route::prefix('client')->group(function () {

    Route::post('/register', [ClientController::class, 'registerClient']);

    Route::middleware(['jwt', 'check.permission:CREATE_ADDRESS'])->group(function () {
        Route::post('/create-address', [AddressController::class, 'store']);
    });

    Route::middleware(['jwt', 'check.permission:UPDATE_ADDRESS'])->group(function () {
        Route::put('/update-address/{id}', [AddressController::class, 'update']);
    });
});
