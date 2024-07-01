<?php

use App\Http\Controllers\Partner\BankController;
use App\Http\Controllers\Partner\FaqController;
use App\Http\Controllers\Partner\HelpController;
use App\Http\Controllers\Partner\LoginController;
use App\Http\Controllers\Partner\MarketingController;
use App\Http\Controllers\Partner\ProfileController;
use App\Http\Controllers\Partner\SellerController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:partner')->group(function () {
    Route::post('/partner-login', [LoginController::class, 'login'])->name('partner-login');
    Route::get('login', function () {
        return view('partner.auth.login');
    });
});
Route::middleware(['partner.auth', 'no-back-history'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('partner-dashboard');
    Route::get('partner-logout', [LoginController::class, 'logout'])->name('partner-logout');
    Route::get('partner-profile', [ProfileController::class, 'index'])->name('partner-profile');
    Route::post('store-profile', [ProfileController::class, 'saveProfile'])->name('partner-store-image');
    Route::post('store-data', [ProfileController::class, 'updateProfile'])->name('partner-profile-data');
    Route::post('partner-store-bank-details', [BankController::class, 'storeBank'])->name('store-bank-partner');
    Route::post('store-kyc-partner', [BankController::class, 'storeKYC'])->name('store-kyc-partner');

    Route::get('/get-partner-faq',[FaqController::class,'index'])->name('get-faq-partner');
    Route::get('get-marketing-partner',[MarketingController::class,'index'])->name('get-marketing-partner');
    Route::get('/get-partner-help',[HelpController::class,'index'])->name('get-partner-help');

    Route::get('partner-add-seller',[SellerController::class,'index'])->name('partner-add-seller');
    Route::post('seller-post',[SellerController::class,'store'])->name('partner-store-seller');
    Route::put('partner-seller-update/{id}',[SellerController::class,'update'])->name('partner-update-seller');
    Route::delete('seller-delete/{id}',[SellerController::class,'destroy'])->name('partner-delete-seller');
    Route::get('get-specific-seller-lead/{id}',[SellerController::class,'getLeads'])->name('get-specific-seller-lead');
    Route::get('/partner/seller-login/{seller}', [SellerController::class, 'loginSeller'])->name('partner.seller.login');
});
