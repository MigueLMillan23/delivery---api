@extends('layouts.app')

@section('content')
<h2>Nuevo Producto</h2>
<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="number" name="precio" step="0.01" placeholder="Precio" required>
    <select name="categoria_id" required>
        <option value="">Seleccione Categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('dashboard') }}">Volver</a>

@endsection
