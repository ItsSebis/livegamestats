<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/show/{game}', [GamesController::class, 'show'])->name('game.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/games', [GamesController::class, 'index'])->name('game.index');

    Route::get('/games/create', [GamesController::class, 'create'])->name('game.create');

    Route::get('/games/{game}/addPlayer/{team}', [GamesController::class, 'addPlayer'])->name('game.addPlayer');

    Route::get('/games/{game}', [GamesController::class, 'edit'])->name('game.edit');

    Route::post('/game/store', [GamesController::class, 'store'])->name('game.store');

    Route::post('/game/storePlayer', [GamesController::class, 'storePlayer'])->name('game.storePlayer');

    Route::get('/game/rmPlayer/{player}', [GamesController::class, 'removePlayer'])->name('game.rmPlayer');

    Route::post('/api/player/{player}/update/', [PlayersController::class, 'updateApi'])->name('player.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
