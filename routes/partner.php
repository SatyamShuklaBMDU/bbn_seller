<?php

use App\Http\Controllers\Partner\LoginController;
use App\Http\Controllers\Partner\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::middleware('guest:partner')->group(function () {
    Route::post('/partner-login', [LoginController::class, 'login'])->name('partner-login');
    Route::get('login', function () {
        return view('partner.auth.login');
    });
});
Route::middleware(['partner.auth', 'no-back-history'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('partner-dashboard');
    Route::get('partner-logout', [LoginController::class, 'logout'])->name('partner-logout');
    Route::get('partner-profile',[ProfileController::class,'index'])->name('partner-profile');
    Route::post('store-profile', [ProfileController::class, 'saveProfile'])->name('partner-store-image');
    Route::post('store-data',[ProfileController::class,'updateProfile'])->name('partner-profile-data');
});
