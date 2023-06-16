<?php

use App\Http\Controllers\PrimeHomeEstateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;
use App\Models\PrimeHomeEstate;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [EventController::class, 'home'])->name('home');
Route::get('event/ticket-form/{eventId}',[EventController::class, 'getTicketForm'])->name('getTicketForm');
Route::get('event/ticket-orders', [EventController::class, 'showTicketOrders'])->name('showTicketOrders');

Route::get('event/event-list', [EventController::class, 'eventList'])->name('eventList');
Route::get('event/invoice', [EventController::class, 'getTicketInvoice'])->name('getTicketInvoice');
Route::Resources([
    'event'=> EventController::class,
    'estate' => PrimeHomeEstateController::class,
]);

Route::get("/info", [EventController::class, "getServerInfo"])->name("getServerInfo");




require __DIR__.'/auth.php';
