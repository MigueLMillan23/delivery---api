<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Repartidor;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Categoria;

class FrontendController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $repartidores = Repartidor::all();
        $pedidos = Pedido::with(['cliente', 'repartidor'])->get();
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();

        return view('dashboard', compact('clientes','repartidores','pedidos','productos','categorias'));
    }
}
