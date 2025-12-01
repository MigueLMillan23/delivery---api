<h2>Lista de Repartidores</h2>
<a href="{{ route('repartidores.create') }}">Nuevo Repartidor</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Disponible</th><th>Acciones</th>
    </tr>
    @foreach($repartidores as $r)
    <tr>
        <td>{{ $r->id }}</td>
        <td>{{ $r->nombre }}</td>
        <td>{{ $r->telefono }}</td>
        <td>{{ $r->disponible ? 'Sí' : 'No' }}</td>
        <td>
            <a href="{{ route('repartidores.edit', $r->id) }}">Editar</a>
            <form action="{{ route('repartidores.destroy', $r->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ url('/') }}">Volver al Dashboard</a>
