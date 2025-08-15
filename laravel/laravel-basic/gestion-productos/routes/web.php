<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para VISTAS
Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/editar/{id}', [ProductoController::class, 'edit'])->name('productos.edit');

/** * ✅ RUTA CORREGIDA
 * Ahora apunta al método 'showUpdateForm' para mostrar la página de actualización.
 */
Route::get('/productos/update', [ProductoController::class, 'showUpdateForm'])->name('productos.showUpdateForm');


// Rutas para ACCIONES (POST)
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');
Route::post('/productos/eliminar/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

/**
 * ✅ RUTA DE ACTUALIZACIÓN
 * Esta ruta ya estaba bien, pero ahora el controlador la manejará correctamente.
 */
Route::post('/productos/actualizar/{id}', [ProductoController::class, 'update'])->name('productos.update');