<?php

use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/equipos/index', [EquipoController::class, 'index'])->name('equipos.index');
Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos/store', [EquipoController::class, 'store'])->name('equipos.store');
Route::post('/equipos/destroy/{id}',[EquipoController::class, 'destroy'])->name('equipos.destroy');
Route::get('/equipos/edit/{id}', [EquipoController::class, 'edit'])->name('equipos.edit');
Route::post('/equipos/update/{id}', [EquipoController::class, 'update'])->name('equipos.update');

//Jugadores

Route::get('/jugadores/index', [App\Http\Controllers\JugadorController::class, 'index'])->name('jugadores.index');
Route::get('/jugadores/create', [App\Http\Controllers\JugadorController::class, 'create'])->name('jugadores.create');
Route::post('/jugadores/store', [App\Http\Controllers\JugadorController::class, 'store'])->name('jugadores.store');
Route::post('/jugadores/destroy/{id}',[App\Http\Controllers\JugadorController::class, 'destroy'])->name('jugadores.destroy');
Route::get('/jugadores/edit/{id}', [App\Http\Controllers\JugadorController::class, 'edit'])->name('jugadores.edit');
Route::post('/jugadores/update/{id}', [App\Http\Controllers\JugadorController::class, 'update'])->name('jugadores.update');