<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
Route::post('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::post('/pacientes/destroy/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
//

