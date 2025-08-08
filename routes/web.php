<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\auth\AuthController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth:admin')->get('/', function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});



// Routes for authenticated admins (admin guard)
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class)->except('show');
    Route::resource('/admins', AdminController::class)->except('show');
    Route::resource('/posts', PostController::class)->except('show');
    Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/posts/block/{id}', [PostController::class, 'block'])->name('posts.block');
});


Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('login', [AuthController::class, 'view'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});