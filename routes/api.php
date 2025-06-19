<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// posts routes
Route::get('/post', [PostsController::class, 'index']);
Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::put('/post', [PostsController::class, 'update']);
Route::delete('/post/{id}', [PostsController::class, 'destroy']);
Route::get('/post/{id}/comment', [PostsController::class, 'getComments']);

// comments routes
Route::get('/comment', [CommentsController::class, 'index']);
Route::post('/comment', [CommentsController::class, 'store']);
Route::get('/comment/{id}', [CommentsController::class, 'show']);
Route::put('/comment', [CommentsController::class, 'update']);
Route::delete('/comment/{id}', [CommentsController::class, 'destroy']);
