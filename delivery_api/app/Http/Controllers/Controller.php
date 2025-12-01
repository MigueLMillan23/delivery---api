<?php

namespace App\Http\Controllers;
/**
 * @OA\Info(
 *     title="API REST - Proyecto Delivery",
 *     version="1.0.0",
 *     description="Documentación general de la API del sistema Delivery. Incluye endpoints públicos y protegidos.",
 *     @OA\Contact(
 *         email="soporte@deliveryapp.com"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://127.0.0.1:8000",
 *     description="Servidor local de desarrollo"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Usa el token obtenido tras iniciar sesión con Sanctum"
 * )
 */


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
