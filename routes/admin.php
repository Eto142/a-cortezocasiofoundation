<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\NameController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {

    // Guest-only routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    });

    // Auth-protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

        // Names & Writeups
        Route::resource('names', NameController::class)->names('names');

        // Change Password
        Route::get('/change-password', [AdminProfileController::class, 'showChangePassword'])->name('change.password');
        Route::post('/change-password', [AdminProfileController::class, 'changePassword'])->name('change.password.post');
    });

});

