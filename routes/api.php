<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/register-member', [AuthController::class, 'registerMember']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('review/', [ReviewController::class, 'index']);
Route::post('/review', [ReviewController::class, 'store']);
Route::post('/review/{id}', [ReviewController::class, 'update']);
Route::delete('/review/{id}', [ReviewController::class, 'delete']);

Route::get('comment/', [CommentController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store']);
Route::post('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'delete']);
