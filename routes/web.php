<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Landing / Home
Route::get('/', [HomeController::class, 'welcome'])
    ->name('home.index');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (JETSTREAM)
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTOS / INVENTARIO
    |--------------------------------------------------------------------------
    */


    Route::get('/productos', [ProductController::class, 'index'])
        ->name('productos.index');

    Route::get('/productos/crear', [ProductController::class, 'create'])
        ->name('productos.create');

    Route::post('/productos', [ProductController::class, 'storeProducto'])
        ->name('productos.store');

    Route::get('/productos/{id}/editar', [ProductController::class, 'editarProducto'])
        ->name('productos.edit');

    Route::put('/productos/{id}', [ProductController::class, 'updateProducto'])
        ->name('productos.update');

    Route::delete('/productos/{id}', [ProductController::class, 'delete'])
        ->name('productos.destroy');

    Route::get('/productos/{id}', [ProductController::class, 'show'])
        ->name('productos.show');
});
