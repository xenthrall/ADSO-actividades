<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
