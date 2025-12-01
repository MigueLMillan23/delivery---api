<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repartidor;

class RepartidorController extends Controller
{
    // Mostrar todos los repartidores
    public function index()
    {
        $repartidores = Repartidor::all();
        return view('repartidores.index', compact('repartidores'));
    }

    // Formulario para crear repartidor
    public function create()
    {
        return view('repartidores.create');
    }

    // Guardar nuevo repartidor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required'
        ]);

        Repartidor::create($request->all());
        return redirect()->route('repartidores.index');
    }

    // Formulario para editar repartidor
    public function edit($id)
    {
        $repartidor = Repartidor::findOrFail($id);
        return view('repartidores.edit', compact('repartidor'));
    }

    // Actualizar repartidor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required'
        ]);

        $repartidor = Repartidor::findOrFail($id);
        $repartidor->update($request->all());
        return redirect()->route('repartidores.index');
    }

    // Eliminar repartidor
    public function destroy($id)
    {
        $repartidor = Repartidor::findOrFail($id);
        $repartidor->delete();
        return redirect()->route('repartidores.index');
    }
}
