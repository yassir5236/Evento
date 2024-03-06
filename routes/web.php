<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;


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



require __DIR__.'/auth.php';
