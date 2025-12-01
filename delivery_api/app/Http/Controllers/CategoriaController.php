<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Formulario para crear categoría
    public function create()
    {
        return view('categorias.create');
    }

    // Guardar nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre'
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    // Formulario para editar categoría
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    // Actualizar categoría
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $id
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    // Eliminar categoría
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
