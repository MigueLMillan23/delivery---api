<h2>Editar Pedido</h2>
<form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="cliente_id" required>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nombre }}
            </option>
        @endforeach
    </select>
    <select name="repartidor_id">
        <option value="">Seleccione Repartidor (opcional)</option>
        @foreach($repartidores as $repartidor)
            <option value="{{ $repartidor->id }}" {{ $pedido->repartidor_id == $repartidor->id ? 'selected' : '' }}>
                {{ $repartidor->nombre }}
            </option>
        @endforeach
    </select>
    <select name="estado" required>
        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('pedidos.index') }}">Volver</a>
