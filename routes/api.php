<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->group(function () {
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts/store', [PostController::class, 'store']);
});



Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [RegisterController::class, 'register']);

});
