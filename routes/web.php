<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/why', function () {
    return view('why');
});

// Blog Routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

// Category Routes
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

// Comment Routes
Route::post('/comments', [CommentController::class, 'store']);
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit']);
Route::put('/comments/{comment}', [CommentController::class, 'update']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
