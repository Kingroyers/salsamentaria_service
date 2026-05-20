<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Rutas públicas — Sin login
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect()->route('login'));

Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas del Cajero — Solo rol cajero
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:cajero'])->group(function () {

    Route::get('/pos', fn() => view('pos.index'))->name('pos.index');

    // Aquí irán las rutas del módulo POS más adelante:
    // Route::post('/pos/venta', [VentaController::class, 'store'])->name('pos.venta.store');
    // Route::get('/pos/factura/{id}', [VentaController::class, 'factura'])->name('pos.factura');
});

/*
|--------------------------------------------------------------------------
| Rutas del Admin — Solo rol admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Aquí irán los módulos de admin más adelante:
    // Route::resource('productos', ProductoController::class);
    // Route::resource('usuarios', UsuarioController::class);
    // Route::get('reportes', [ReporteController::class, 'index'])->name('reportes');
});