<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallefacturaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;


Route::get('/', function () {return view(view: 'index');})->name('index');

//rutas para marca

route::get('marca/index',[MarcaController::class,'index'])->name('marca.index');

route::get('marca/create',[MarcaController::class,'create'])->name('marca.create');

route::post('marca/store',[MarcaController::class,'store'])->name('marca.store');

route::get('marca/edit/{id}',[MarcaController::class,'edit'])->name('marca.edit');

Route::put('marca/{id}', [MarcaController::class, 'update'])->name('marca.update');

Route::delete('marca/{id}', [MarcaController::class, 'destroy'])->name('marca.destroy');



//rutas para categoria

route::get('categoria/index',[CategoriaController::class,'index'])->name('categoria.index');

route::get('categoria/create',[CategoriaController::class,'create'])->name('categoria.create');

route::post('categoria/store',[CategoriaController::class,'store'])->name('categoria.store');

route::get('categoria/edit/{id}',[CategoriaController::class,'edit'])->name('categoria.edit');

route::put('categoria/update/{id}',[CategoriaController::class,'update'])->name('categoria.update');

route::delete('categoria/destroy/{id}',[CategoriaController::class,'destroy'])->name('categoria.destroy');


//rutas para paymentMethod

route::get('paymentMethod/index',[PaymentMethodController::class,'index'])->name('payment.index');

route::get('paymentMethod/create',[PaymentMethodController::class,'create'])->name('payment.create');

route::post('paymentMethod/store',[PaymentMethodController::class,'store'])->name('payment.store');

route::get('paymentMethod/edit/{id}',[PaymentMethodController::class,'edit'])->name('payment.edit');

route::put('paymentMethod/update/{id}',[PaymentMethodController::class,'update'])->name('payment.update');

route::delete('paymentMethod/destroy/{id}',[PaymentMethodController::class,'destroy'])->name('payment.destroy');


//rutas para estado

route::get('estado/index',[EstadoController::class,'index'])->name('estado.index');

route::get('estado/create',[EstadoController::class,'create'])->name('estado.create');

route::post('estado/store',[EstadoController::class,'store'])->name('estado.store');

route::get('estado/edit/{id}',[EstadoController::class,'edit'])->name('estado.edit');

route::put('estado/update/{id}',[EstadoController::class,'update'])->name('estado.update');

route::delete('estado/destroy/{id}',[EstadoController::class,'destroy'])->name('estado.destroy');



//rutas para cliente

route::get('cliente/index',[ClienteController::class,'index'])->name('cliente.index');

route::get('cliente/create',[ClienteController::class,'create'])->name('cliente.create');

route::post('cliente/store',[ClienteController::class,'store'])->name('cliente.store');

route::get('cliente/edit/{id}',[ClienteController::class,'edit'])->name('cliente.edit');

route::put('cliente/update/{id}',[ClienteController::class,'update'])->name('cliente.update');

route::delete('cliente/destroy/{id}',[ClienteController::class,'destroy'])->name('cliente.destroy');



//rutas para producto

route::get('producto/index',[ProductoController::class,'index'])->name('producto.index');

route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');

route::post('producto/store',[ProductoController::class,'store'])->name('producto.store');

route::get('producto/edit/{id}',[ProductoController::class,'edit'])->name('producto.edit');

route::put('producto/update/{id}',[ProductoController::class,'update'])->name('producto.update');

route::delete('producto/destroy/{id}',[ProductoController::class,'destroy'])->name('producto.destroy');



//rutas para factura

route::get('factura/index',[FacturaController::class,'index'])->name('factura.index');

route::get('factura/create',[FacturaController::class,'create'])->name('factura.create');

route::post('factura/store',[FacturaController::class,'store'])->name('factura.store');

route::get('factura/edit/{id}',[FacturaController::class,'edit'])->name('factura.edit');

route::put('factura/update/{id}',[FacturaController::class,'update'])->name('factura.update');

route::delete('factura/destroy/{id}',[FacturaController::class,'destroy'])->name('factura.destroy');



//rutas para detalle-factura

route::get('detalle/index',[DetallefacturaController::class,'index'])->name('detalle.index');

route::get('detalle/create',[DetallefacturaController::class,'create'])->name('detalle.create');

route::post('detalle/store',[DetallefacturaController::class,'store'])->name('detalle.store');

route::get('detalle/edit/{id}',[DetallefacturaController::class,'edit'])->name('detalle.edit');

route::put('detalle/update/{id}',[DetallefacturaController::class,'update'])->name('detalle.update');

route::delete('detalle/destroy/{id}',[DetallefacturaController::class,'destroy'])->name('detalle.destroy');


route::get('dash/index',[DashController::class,'index'])->name('dash.index');
route::get('dash/ventas',[DashController::class,'ventas'])->name('dash.ventas');
route::get('dash/clientes',[DashController::class,'clientes'])->name('dash.clientes');
route::get('dash/inventario',[DashController::class,'inventario'])->name('dash.inventario');
route::get('dash/financieros',[DashController::class,'financieros'])->name('dash.financieros');
