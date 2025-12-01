<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductoApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Aquí se registran las rutas de la API.
| Se cargan automáticamente por RouteServiceProvider
| y estarán dentro del grupo de middleware "api".
|--------------------------------------------------------------------------
*/

// Rutas públicas de autenticación
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rutas públicas para productos
Route::apiResource('productos', ProductoApiController::class)->only(['index', 'show']);

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // CRUD completo de productos (solo para usuarios autenticados)
    Route::apiResource('productos', ProductoApiController::class)->except(['index', 'show']);
});
