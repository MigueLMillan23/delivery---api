<h2>Lista de Clientes</h2>
<a href="{{ route('clientes.create') }}">Nuevo Cliente</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th>
    </tr>
    @foreach($clientes as $cliente)
    <tr>
        <td>{{ $cliente->id }}</td>
        <td>{{ $cliente->nombre }}</td>
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->telefono }}</td>
        <td>
            <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ url('/') }}">Volver al Dashboard</a>
