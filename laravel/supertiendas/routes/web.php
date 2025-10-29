<?php

use App\Http\Controllers\{
    CategoriaController,
    ClienteController,
    DetallefacturaController,
    EstadoController,
    FacturaController,
    MarcaController,
    PaymentMethodController,
    ProductoController,
    DashController,
    AuthController,
    PerfilController
};
use Illuminate\Support\Facades\Route;

// Rutas públicas (sin autenticación)
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', [AuthController::class, 'verlogin'])->name('login');
Route::post('/loginsubmit', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registro de usuarios
Route::get('/register', [AuthController::class, 'verRegistro'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


// Grupo protegido por autenticación
Route::middleware(['auth'])->group(function () {

    // PERFIL
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::post('/perfil', [PerfilController::class, 'update'])->name('perfil.update');

    // DASHBOARD
    Route::get('dash/index', [DashController::class, 'index'])->name('dash.index');
    Route::get('dash/ventas', [DashController::class, 'ventas'])->name('dash.ventas');
    Route::get('dash/clientes', [DashController::class, 'clientes'])->name('dash.clientes');
    Route::get('dash/inventario', [DashController::class, 'inventario'])->name('dash.inventario');
    Route::get('dash/financieros', [DashController::class, 'financieros'])->name('dash.financieros');

    // MARCA
    Route::get('marca/index', [MarcaController::class, 'index'])->name('marca.index');
    Route::get('marca/create', [MarcaController::class, 'create'])->name('marca.create');
    Route::post('marca/store', [MarcaController::class, 'store'])->name('marca.store');
    Route::get('marca/edit/{id}', [MarcaController::class, 'edit'])->name('marca.edit');
    Route::put('marca/{id}', [MarcaController::class, 'update'])->name('marca.update');
    Route::delete('marca/{id}', [MarcaController::class, 'destroy'])->name('marca.destroy');

    // CATEGORÍA
    Route::get('categoria/index', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('categoria/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

    // MÉTODOS DE PAGO
    Route::get('paymentMethod/index', [PaymentMethodController::class, 'index'])->name('payment.index');
    Route::get('paymentMethod/create', [PaymentMethodController::class, 'create'])->name('payment.create');
    Route::post('paymentMethod/store', [PaymentMethodController::class, 'store'])->name('payment.store');
    Route::get('paymentMethod/edit/{id}', [PaymentMethodController::class, 'edit'])->name('payment.edit');
    Route::put('paymentMethod/update/{id}', [PaymentMethodController::class, 'update'])->name('payment.update');
    Route::delete('paymentMethod/destroy/{id}', [PaymentMethodController::class, 'destroy'])->name('payment.destroy');

    // ESTADO
    Route::get('estado/index', [EstadoController::class, 'index'])->name('estado.index');
    Route::get('estado/create', [EstadoController::class, 'create'])->name('estado.create');
    Route::post('estado/store', [EstadoController::class, 'store'])->name('estado.store');
    Route::get('estado/edit/{id}', [EstadoController::class, 'edit'])->name('estado.edit');
    Route::put('estado/update/{id}', [EstadoController::class, 'update'])->name('estado.update');
    Route::delete('estado/destroy/{id}', [EstadoController::class, 'destroy'])->name('estado.destroy');

    // CLIENTE
    Route::get('cliente/index', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('cliente/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('cliente/destroy/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

    // PRODUCTO
    Route::get('producto/index', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('producto/create', [ProductoController::class, 'create'])->name('producto.create');
    Route::post('producto/store', [ProductoController::class, 'store'])->name('producto.store');
    Route::get('producto/edit/{id}', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::put('producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('producto/destroy/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

    // FACTURA
    Route::get('factura/index', [FacturaController::class, 'index'])->name('factura.index');
    Route::get('factura/create', [FacturaController::class, 'create'])->name('factura.create');
    Route::post('factura/store', [FacturaController::class, 'store'])->name('factura.store');
    Route::get('factura/edit/{id}', [FacturaController::class, 'edit'])->name('factura.edit');
    Route::put('factura/update/{id}', [FacturaController::class, 'update'])->name('factura.update');
    Route::delete('factura/destroy/{id}', [FacturaController::class, 'destroy'])->name('factura.destroy');

    // DETALLE FACTURA
    Route::get('detalle/index', [DetallefacturaController::class, 'index'])->name('detalle.index');
    Route::get('detalle/create', [DetallefacturaController::class, 'create'])->name('detalle.create');
    Route::post('detalle/store', [DetallefacturaController::class, 'store'])->name('detalle.store');
    Route::get('detalle/edit/{id}', [DetallefacturaController::class, 'edit'])->name('detalle.edit');
    Route::put('detalle/update/{id}', [DetallefacturaController::class, 'update'])->name('detalle.update');
    Route::delete('detalle/destroy/{id}', [DetallefacturaController::class, 'destroy'])->name('detalle.destroy');

    // PDFs
    Route::get('producto/pdf', [ProductoController::class, 'verpdfproducto'])->name('producto.pdf');
    Route::get('producto/generarpdf', [ProductoController::class, 'generarpdfproducto'])->name('producto.generarpdf');

    Route::get('detalle/pdf', [DetallefacturaController::class, 'verpdfdetalle'])->name('detalle.pdf');
    Route::get('detalle/generarpdf', [DetallefacturaController::class, 'generarpdfdetalle'])->name('detalle.generarpdf');
});
