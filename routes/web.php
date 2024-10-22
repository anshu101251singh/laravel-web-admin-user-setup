<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\VisitorsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'user_login'])->name('user.login');
Route::get('/captcha', [AuthController::class, 'captcha'])->name('captcha');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user-register', [AuthController::class, 'user_registration'])->name('user.registration');
Route::post('/user-register', [AuthController::class, 'register'])->name('register');
Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');


Route::prefix('admin')->name('admin.')->middleware(['check_user','visitors_record'])->group(function () {
    //Admin Dashboard
    Route::get('view-profile', [AdminController::class, 'admin_view_profile'])->name('view.profile');
    Route::get('edit-profile', [AdminController::class, 'admin_edit_profile'])->name('edit.profile');
    Route::post('edit-profile', [AdminController::class, 'admin_update_profile'])->name('update.profile');
    Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::get('dashboard/visitors-details', [VisitorsController::class, 'admin_visitors_detail'])->name('visitors.index');

    //user dashboard
    // Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
});

//user dashboard
// Route::middleware(['is_user'])->group(function () {
//     Route::get('/user/dashboard', [UserController::class, 'user_dashboard'])->name('user.dashboard');
// });
