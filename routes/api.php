<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PrimeHomeEstateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AccountingController;

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

Route::post("converted-amount", [AccountingController::class,"convertCurrency"])->name("convertCurrency");
Route::post('buy-ticket', [EventController::class, 'buyTicket'])->name('buyTicket');
Route::put('update-payment-confirmation/{ticketId}', [EventController::class, 'updateIsPaymentConfirmed'])->name('updateIsPaymentConfirmed');
Route::get('send-ticket/{ticketId}', [EventController::class, 'sendTicket'])->name('sendTicket');
//Route::get("/estate", [PrimeHomeEstateController::class, 'getEstates'])->name('getEstate');
