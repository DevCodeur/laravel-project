<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('post',[TestApiController::class, 'index']);

// Route::get('post/create',[PostController::class, 'create']);

Route::post('post/store',[TestApiController::class, 'store'])->name('post.store');