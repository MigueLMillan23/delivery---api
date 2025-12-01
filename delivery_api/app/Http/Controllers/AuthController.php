<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    /**
 * @OA\Post(
 *     path="/api/register",
 *     summary="Registrar un nuevo usuario",
 *     description="Crea un nuevo usuario en el sistema y devuelve su token de acceso.",
 *     tags={"Autenticación"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "email", "password"},
 *             @OA\Property(property="name", type="string", example="Miguel Millán"),
 *             @OA\Property(property="email", type="string", example="miguel@correo.com"),
 *             @OA\Property(property="password", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(response=201, description="Usuario registrado correctamente"),
 *     @OA\Response(response=400, description="Error en los datos enviados")
 * )
 */

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);

        return response()->json(['message'=>'Usuario creado'], 201);
    }

    /**
 * @OA\Post(
 *     path="/api/login",
 *     summary="Iniciar sesión de usuario",
 *     description="Permite iniciar sesión con correo y contraseña. Devuelve un token de acceso Sanctum.",
 *     tags={"Autenticación"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", example="miguel@correo.com"),
 *             @OA\Property(property="password", type="string", example="12345678")
 *         )
 *     ),
 *     @OA\Response(response=200, description="Inicio de sesión exitoso"),
 *     @OA\Response(response=401, description="Credenciales incorrectas")
 * )
 */


    public function login(Request $req)
    {
        $req->validate(['email'=>'required|email','password'=>'required']);
        $user = User::where('email',$req->email)->first();
        if(! $user || ! Hash::check($req->password, $user->password)) {
            throw ValidationException::withMessages(['email'=>['Credenciales inválidas']]);
        }

        $token = $user->createToken('api_token')->plainTextToken;
        return response()->json(['token'=>$token,'user'=>$user]);
    }


    /**
 * @OA\Post(
 *     path="/api/logout",
 *     summary="Cerrar sesión del usuario",
 *     description="Elimina el token de acceso del usuario autenticado (requiere estar logueado).",
 *     tags={"Autenticación"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(response=200, description="Sesión cerrada correctamente"),
 *     @OA\Response(response=401, description="No autenticado o token inválido")
 * )
 */

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'Logged out']);
    }


    /**
 * @OA\Get(
 *     path="/api/user",
 *     summary="Obtener información del usuario autenticado",
 *     description="Devuelve los datos del usuario que está usando el token actual (requiere autenticación).",
 *     tags={"Autenticación"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(response=200, description="Datos del usuario obtenidos correctamente"),
 *     @OA\Response(response=401, description="No autenticado o token inválido")
 * )
 */
    public function user(Request $req)
    {
        return response()->json($req->user());
    }
}
