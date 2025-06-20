<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authenticatable routes
Route::middleware('auth:sanctum')->group(function () {

    // user routes
    Route::post('/logout', [UsersController::class, 'logout']);

    // post routes
    Route::post('/post', [PostsController::class, 'store']);
    Route::put('/post', [PostsController::class, 'update']);
    Route::delete('/post/{id}', [PostsController::class, 'destroy']);

    // comments routes
    Route::post('/comment', [CommentsController::class, 'store']);
    Route::put('/comment', [CommentsController::class, 'update']);
    Route::delete('/comment/{id}', [CommentsController::class, 'destroy']);
});

// publicaly accessable routes

// user routes
Route::post('/signup', [UsersController::class, 'signup']);
Route::post('/login', [UsersController::class, 'login']);

// posts routes
Route::get('/post', [PostsController::class, 'index']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::get('/post/{id}/comment', [PostsController::class, 'getComments']);

// comment routes
Route::get('/comment/{id}', [CommentsController::class, 'show']);
Route::get('/comment', [CommentsController::class, 'index']);
