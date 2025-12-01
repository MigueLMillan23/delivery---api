<h2>Editar Cliente</h2>
<form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $cliente->nombre }}" required>
    <input type="email" name="email" value="{{ $cliente->email }}" required>
    <input type="text" name="telefono" value="{{ $cliente->telefono }}" required>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('clientes.index') }}">Volver</a>
