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