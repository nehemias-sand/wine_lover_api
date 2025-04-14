<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('jwt')->post('logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/register-member', [AuthController::class, 'registerMember']);

Route::prefix('admin')->group(function () {
    Route::middleware(['jwt', 'check.permission:CREATE_PRODUCT'])->post('/products', function () {
        return response()->json(['message' => 'Producto creado']);
    });
});
