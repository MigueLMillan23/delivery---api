@extends('layouts.app')

@section('content')
<h2>Productos</h2>
<a href="{{ route('productos.create') }}">Nuevo Producto</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    @foreach($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>${{ $producto->precio }}</td>
        <td>{{ $producto->categoria->nombre ?? '-' }}</td>
        <td class="actions">
            <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro quieres eliminar?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
