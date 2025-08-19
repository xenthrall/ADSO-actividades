<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');

Route::get('/clientes/read', [App\Http\Controllers\ClienteController::class, 'read'])->name('clientes.read');