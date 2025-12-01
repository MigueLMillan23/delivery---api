<h2>Pedidos</h2>
<a href="{{ route('pedidos.create') }}">Nuevo Pedido</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Repartidor</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    @foreach($pedidos as $pedido)
    <tr>
        <td>{{ $pedido->id }}</td>
        <td>{{ $pedido->cliente->nombre ?? '' }}</td>
        <td>{{ $pedido->repartidor->nombre ?? 'Sin asignar' }}</td>
        <td>{{ $pedido->estado }}</td>
        <td>
            <a href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>
            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
