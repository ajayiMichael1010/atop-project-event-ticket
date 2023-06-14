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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [EventController::class, 'home'])->name('home');
Route::get('event/ticket-form/{eventId}',[EventController::class, 'getTicketForm'])->name('getTicketForm');
Route::get('event/ticket-orders', [EventController::class, 'showTicketOrders'])->name('showTicketOrders');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('event/event-list', [EventController::class, 'eventList'])->name('eventList');
Route::get('event/invoice', [EventController::class, 'getTicketInvoice'])->name('getTicketInvoice');
Route::Resources([
    'event'=> EventController::class,
    'estate' => PrimeHomeEstateController::class,
]);




require __DIR__.'/auth.php';
