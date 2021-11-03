<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;

Route::group(['prefix' => '/dashboard'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [BackController::class, 'index'])->name('home');
});
