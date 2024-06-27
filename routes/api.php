<?php

use App\Http\Controllers\API\PartnerController;
use App\Http\Controllers\API\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('seller-login', [SellerController::class, 'login']);
Route::post('seller-force-login', [SellerController::class, 'forceLogin']);
Route::middleware('auth:sanctum')->post('seller-logout', [SellerController::class, 'logout']);

// Partner Route
Route::post('partner-login', [PartnerController::class, 'login']);
Route::post('partner-force-login',[PartnerController::class,'forceLogin']);
Route::post('partner-logout',[PartnerController::class,'logout'])->middleware('auth:sanctum');

// Route::post('partner-add-seller',[])