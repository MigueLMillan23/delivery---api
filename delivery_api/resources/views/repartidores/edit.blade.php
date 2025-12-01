<h2>Editar Repartidor</h2>
<form action="{{ route('repartidores.update', $repartidor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $repartidor->nombre }}" required>
    <input type="text" name="telefono" value="{{ $repartidor->telefono }}" required>
    <select name="disponible">
        <option value="1" {{ $repartidor->disponible ? 'selected' : '' }}>Disponible</option>
        <option value="0" {{ !$repartidor->disponible ? 'selected' : '' }}>No Disponible</option>
    </select>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('repartidores.index') }}">Volver</a>
