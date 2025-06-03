<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\NotificacionController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [GameController::class, 'index'])->middleware(['auth', 'verified', 'rol.empresa'])->name
('games.index');

Route::get('/games/create', [GameController::class, 'create'])->middleware(['auth', 'verified'])->name
('games.create');

Route::get('/games/{game}/edit', [GameController::class, 'edit'])->middleware(['auth', 'verified'])->name
('games.edit');

Route::get('/games/{game}', [GameController::class, 'show'])->middleware(['auth', 'verified'])->name
('games.show');

Route::get('/jugadores/{game}', [JugadorController::class, 'index'])->name('jugadores.index');

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified', 'rol.empresa'])->name('notificaciones');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
