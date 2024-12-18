<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\AccessoryController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/dashboard/{user}', [PublicController::class, 'dashboard'])->name('dashboard');

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
Route::get('/console/show/{console}',[ConsoleController::class, 'show'])->name('console.show');
Route::get('/console/edit/{console}', [ConsoleController::class, 'edit'])->name('console.edit');
Route::put('/console/update/{console}',[ConsoleController::class, 'update'])->name('console.update');
Route::delete('/console/delete/{console}',[ConsoleController::class, 'destroy'])->name('console.delete');

Route::get('/accessory/index',[AccessoryController::class, 'index'])->name('accessory.index');
Route::get('/accessory/create',[AccessoryController::class, 'create'])->name('accessory.create');
Route::get('/accessory/show/{accessory}',[AccessoryController::class, 'show'])->name('accessory.show');
Route::get('/accessory/edit/{accessory}', [AccessoryController::class, 'edit'])->name('accessory.edit');
Route::put('/accessory/update/{accessory}',[AccessoryController::class, 'update'])->name('accessory.update');

