<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\UsuarioController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', [ProductoController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/like/{id}', [ProductoController::class, 'like'])->name('productos.like');
    Route::get('/dashboard/tus-productos', [ProductoController::class, 'index'])->name('productos.tusproductos');
    Route::get('/dashboard/favoritos', [ProductoController::class, 'index'])->name('productos.favoritos');
    Route::get('/producto/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::post('/producto/{id}/vendido', [ProductoController::class, 'vendido'])->name('productos.vendido');
    Route::post('/producto/store', [ProductoController::class, 'store'])->name('productos.store');
    Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte');

    // USERS
    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});
