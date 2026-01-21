<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', [HomeController::class, "Welcome"])->name("productos.index");

// Rutas de productos
Route::get('/productos', [ProductController::class, "ShowProductos"])->name('productos.show');

// Crear producto
Route::get('/productos/create', [ProductController::class, "CrearProductos"])->name("productos.create");
Route::get('/productos/crear', [ProductController::class, "Formulario"])->name('productos.crear');

// Editar producto
Route::get('/productos/edit', [ProductController::class, "EditarProducto"])->name('productos.edit');
Route::get('/productos/actualizar', [ProductController::class, "ShowFormularioActualizarProducto"])->name("productos.actualizar");

// Eliminar producto
Route::get('/producto/{id}', [ProductController::class, "BorrarProducto"])->name("productos.destroy");
