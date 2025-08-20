<?php

use App\Http\Controllers\ClienteController;
use App\Models\Cliente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes/index', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
Route::post('/clientes/delete/{id_cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::post('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
