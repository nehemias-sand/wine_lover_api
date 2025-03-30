<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/register-member', [AuthController::class, 'registerMember']);
Route::post('/login', [AuthController::class, 'login']);
