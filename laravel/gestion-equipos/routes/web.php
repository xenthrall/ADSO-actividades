<?php

use App\Http\Controllers\EquipoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/equipos/index', [EquipoController::class, 'index'])->name('equipos.index');

Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos/store', [EquipoController::class, 'store'])->name('equipos.store');