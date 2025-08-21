<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes/index', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [ClienteController::class, 'store'])->name('clientes.store');
Route::post('/clientes/delete/{id_cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::post('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
