<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('event-categories', [EventCategoryController::class, 'index'])->name('event-categories.index');
    Route::get('event-categories/create', [EventCategoryController::class, 'create'])->name('event-categories.create');
    Route::post('event-categories', [EventCategoryController::class, 'store'])->name('event-categories.store');
    Route::get('event-categories/{category}/edit', [EventCategoryController::class, 'edit'])->name('event-categories.edit');
    Route::put('event-categories/{category}', [EventCategoryController::class, 'update'])->name('event-categories.update');
    Route::delete('event-categories/{category}', [EventCategoryController::class, 'destroy'])->name('event-categories.destroy');
// });




// Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

// });




// Groupe de routes protégé par le middleware auth
// Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/events/filter', [EventController::class, 'filter'])->name('events.filter');
    Route::post('/events/search', [EventController::class, 'search'])->name('events.search');
    Route::post('/events/{event}/reserve', [EventController::class, 'reserve'])->name('events.reserve');
    Route::post('/reservations/{reservation}/tickets', [TicketController::class, 'generateTicket'])->name('tickets.generate');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');





// });




require __DIR__.'/auth.php';
