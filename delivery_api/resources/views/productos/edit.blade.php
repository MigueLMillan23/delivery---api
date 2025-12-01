@extends('layouts.app')

@section('content')
<h2>Editar Producto</h2>
<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $producto->nombre }}" required>
    <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}" required>
    <select name="categoria_id" required>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('dashboard') }}">Volver</a>

@endsection
