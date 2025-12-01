<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Repartidor;

class PedidoController extends Controller
{
    // Mostrar todos los pedidos
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'repartidor'])->get();
        return view('pedidos.index', compact('pedidos'));
    }

    // Formulario para crear pedido
    public function create()
    {
        $clientes = Cliente::all();
        $repartidores = Repartidor::all();
        return view('pedidos.create', compact('clientes', 'repartidores'));
    }

    // Guardar nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'repartidor_id' => 'nullable|exists:repartidores,id',
            'estado' => 'required'
        ]);

        Pedido::create($request->all());
        return redirect()->route('pedidos.index');
    }

    // Formulario para editar pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::all();
        $repartidores = Repartidor::all();
        return view('pedidos.edit', compact('pedido', 'clientes', 'repartidores'));
    }

    // Actualizar pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'repartidor_id' => 'nullable|exists:repartidores,id',
            'estado' => 'required'
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        return redirect()->route('pedidos.index');
    }

    // Eliminar pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }
}
