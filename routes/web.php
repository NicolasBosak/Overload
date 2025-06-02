<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', [GameController::class, 'index'])->middleware(['auth', 'verified'])->name
('games.index');

Route::get('/games/create', [GameController::class, 'create'])->middleware(['auth', 'verified'])->name
('games.create');

Route::get('/games/{game}/edit', [GameController::class, 'edit'])->middleware(['auth', 'verified'])->name
('games.edit');

Route::get('/games/{game}', [GameController::class, 'show'])->middleware(['auth', 'verified'])->name
('games.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
