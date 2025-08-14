<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    
    return view('welcome');
});


use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
