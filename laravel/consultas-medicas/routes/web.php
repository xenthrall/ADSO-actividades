<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultasMedicaController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Pacientes rutas sin parametros
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');


// Consultas Médicas rutas sin parametros
Route::get('/consultas-medicas', [ConsultasMedicaController::class, 'index'])->name('consultas_medicas.index');
Route::post('/consultas-medicas/store', [ConsultasMedicaController::class, 'store'])->name('consultas_medicas.store');

//Pacientes rutas con parametros
Route::post('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::post('/pacientes/destroy/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

// Consultas Médicas rutas con parametros
Route::post('/consultas-medicas/{consultasMedica}', [ConsultasMedicaController::class, 'update'])->name('consultas_medicas.update');
Route::post('/consultas-medicas/destroy/{id}', [ConsultasMedicaController::class, 'destroy'])->name('consultas_medicas.destroy');