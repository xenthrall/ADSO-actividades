<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Models\Marca;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Rutas para marcas
Route::get('/marcas/index',[MarcaController::class, 'index'])->name('marcas.index');
Route::get('/marcas/create',[MarcaController::class, 'create'])->name('marcas.create');
Route::post('/marcas/store',[MarcaController::class, 'store'])->name('marcas.store');
Route::post('/marcas/destroy/{id}',[MarcaController::class, 'destroy'])->name('marcas.destroy');
Route::get('/marcas/edit/{id}',[MarcaController::class, 'edit'])->name('marcas.edit');
Route::post('/marcas/update/{id}',[MarcaController::class, 'update'])->name('marcas.update');

//Rutas para categorias
Route::get('/categorias/index',[CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create',[CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias/store',[CategoriaController::class, 'store'])->name('categorias.store');
Route::post('/categorias/destroy/{id}',[CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/edit/{id}',[CategoriaController::class, 'edit'])->name('categorias.edit');
Route::post('/categorias/update/{id}',[CategoriaController::class, 'update'])->name('categorias.update');

//Rutas para productos
Route::get('/productos/index',[ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create',[ProductoController::class, 'create'])->name('productos.create'); 
Route::post('/productos/store',[ProductoController::class, 'store'])->name('productos.store');
Route::post('/productos/destroy/{id}',[ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos.edit');
Route::post('/productos/update/{id}', [ProductoController::class, 'update'])->name('productos.update');