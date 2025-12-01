<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Formulario para crear cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required'
        ]);

        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    // Formulario para editar cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    // Actualizar cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'telefono' => 'required'
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    // Eliminar cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
