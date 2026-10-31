<?php

use App\Http\Controllers\Api\NovaPoshtaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkplaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetController;

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'api'],function () {
        Route::get('cities', [NovaPoshtaController::class, 'searchCities'])->name('api.cities');
        Route::get('streets', [NovaPoshtaController::class, 'searchStreets'])->name('api.streets');
    });

    Route::get('/', DashboardController::class)->name('dashboard');
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    //Route Admin
    Route::middleware(['can:admin-access'])->group(function () {
        Route::prefix('workplaces')->group(function () {
            Route::get('/', [WorkplaceController::class, 'index'])->name('workplaces.index');
            Route::post('/', [WorkplaceController::class, 'store'])->name('workplaces.store');
            Route::put('/{workplace}', [WorkplaceController::class, 'update'])->name('workplaces.update');
            Route::delete('/{workplace}', [WorkplaceController::class, 'destroy'])->name('workplaces.destroy');
        });
    });

    //Route Admin

});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});
