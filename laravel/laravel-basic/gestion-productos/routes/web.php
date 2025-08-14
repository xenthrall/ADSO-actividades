<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    
    return view('welcome');
});


use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index'); // Ruta para listar productos
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create'); // Ruta para mostrar el formulario de creación de producto

Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store'); // Ruta para almacenar un nuevo producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy'); // Ruta para eliminar un producto