<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\ProfileController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Faq ROute
    Route::get('faq-index', [FaqController::class, 'index'])->name('faq-index');

    // Help Route
    Route::get('help-index', [HelpController::class, 'index'])->name('help-index');

    // Marketing Media ROute
    Route::get('marketing-index', [MarketingController::class, 'index'])->name('market-index');

    Route::post('store-profile', [ProfileController::class, 'saveData'])->name('store-profile');
    Route::post('store-profile-image', [ProfileController::class, 'saveProfile'])->name('store-profile-image');

    // Store Bank Details
    Route::post('store-bank-details', [BankController::class, 'storeBank'])->name('store-bank-details');
    Route::post('store-kyc-data', [BankController::class, 'storeKYC'])->name('store-kyc-data');

    // Lead Route
    Route::get('lead-index', [LeadController::class, 'index'])->name('lead-index');
    Route::post('lead-store', [LeadController::class, 'store'])->name('lead-store');
    Route::post('/get-products', [LeadController::class, 'getProducts'])->name('get-products');
    Route::post('/get-types', [LeadController::class, 'getTypes'])->name('get-types');
    Route::get('all-leads', [LeadController::class, 'getLeads'])->name('all-leads');

});

Route::get('/send-test-email', function () {
    try {
        Mail::to('shuklasatyam23056@gmail.com')->send(new TestEmail());
        return 'Test email sent!';
    } catch (\Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});

require __DIR__ . '/auth.php';
