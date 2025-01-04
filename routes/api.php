<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\EateryController;
use App\Http\Controllers\RestaurantController;
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/auth/updateInfo', [AuthController::class, 'updateInfo'])->middleware('auth:sanctum');
Route::post('/send-verification-code', [TelegramController::class, 'sendVerificationCode']);


Route::get('/offers', [OfferController::class, 'index']);
Route::post('/offers', [OfferController::class, 'store']);
Route::get('/offers/{id}', [OfferController::class, 'show']);
Route::post('/offers/{id}', [OfferController::class, 'update']);
Route::delete('/offers/{id}', [OfferController::class, 'destroy']);



Route::apiResource('resturants', ResturantController::class);



Route::apiResource('eateries', EateryController::class);



Route::get('eateries/most-requested', [EateryController::class, 'mostRequested']);
Route::post('eateries/{id}/request', [EateryController::class, 'requestEatery']);
