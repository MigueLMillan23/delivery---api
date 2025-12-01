<h2>Nuevo Pedido</h2>
<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf
    <select name="cliente_id" required>
        <option value="">Seleccione Cliente</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
        @endforeach
    </select>
    <select name="repartidor_id">
        <option value="">Seleccione Repartidor (opcional)</option>
        @foreach($repartidores as $repartidor)
            <option value="{{ $repartidor->id }}">{{ $repartidor->nombre }}</option>
        @endforeach
    </select>
    <select name="estado" required>
        <option value="pendiente">Pendiente</option>
        <option value="enviado">Enviado</option>
        <option value="entregado">Entregado</option>
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('pedidos.index') }}">Volver</a>
