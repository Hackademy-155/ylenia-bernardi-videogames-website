<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/game/create',[GameController::class, 'create'])->name('game.create');
Route::post('/game/store', [GameController::class, 'store'])->name('store');
