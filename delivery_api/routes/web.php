<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\RepartidorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login'); // Login como página inicial

Route::view('/login', 'login')->name('login');
Route::view('/dashboard', 'dashboard')->name('dashboard');

// CRUD
Route::resource('productos', ProductoController::class);
Route::resource('pedidos', PedidoController::class);
Route::resource('repartidores', RepartidorController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('categorias', ClienteController::class);
