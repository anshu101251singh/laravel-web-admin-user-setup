<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'user_login'])->name('user.login');
Route::get('/captcha', [AuthController::class, 'captcha'])->name('captcha');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user-register', [AuthController::class, 'user_registration'])->name('user.registration');
Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');


Route::middleware(['check_user'])->group(function () {
    //Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');

    //user dashboard
    Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
});

//user dashboard
// Route::middleware(['is_user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
// });
