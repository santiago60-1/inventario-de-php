<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PRODUCTOS / INVENTARIO
    |--------------------------------------------------------------------------
    */
    Route::resource('productos', ProductController::class)
    ->parameters(['productos' => 'id']);

    Route::view('/admin/roles', 'admin.roles')
        ->middleware('can:isAdmin')
        ->name('admin.roles');
    });

