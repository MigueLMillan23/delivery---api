<h2>Categorías</h2>
<a href="{{ route('categorias.create') }}">Nueva Categoría</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach($categorias as $categoria)
    <tr>
        <td>{{ $categoria->id }}</td>
        <td>{{ $categoria->nombre }}</td>
        <td>
            <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar categoría?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
