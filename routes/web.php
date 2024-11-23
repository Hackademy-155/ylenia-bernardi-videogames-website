<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ConsoleController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('dashboard');

Route::get('/game/create',[GameController::class, 'create'])->name('game.create');
Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
Route::get('/game/index', [GameController::class, 'index'])->name('game.index');
Route::get('/game/details/{game}',[GameController::class, 'details'])->name('game.details');
Route::get('/game/edit/{game}',[GameController::class, 'edit'])->name('game.edit');
Route::put('/game/update/{game}',[GameController::class, 'update'])->name('game.update');
Route::delete('/game/delete/{game}',[GameController::class, 'delete'])->name('game.delete');

Route::get('/console/index',[ConsoleController::class, 'index'])->name('console.index');
Route::get('/console/create',[ConsoleController::class, 'create'])->name('console.create');
Route::post('/console/store', [ConsoleController::class, 'store'])->name('console.store');
