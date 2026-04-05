<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'index'])->name('home');
Route::get('/profiles/{profile:slug}', [ProfileController::class, 'show'])->name('profiles.show');

Route::get('/donate',  [DonateController::class, 'show'])->name('donate');
Route::post('/donate', [DonateController::class, 'store'])->name('donate.store');
