<h2>Nuevo Repartidor</h2>
<form action="{{ route('repartidores.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <select name="disponible">
        <option value="1">Disponible</option>
        <option value="0">No Disponible</option>
    </select>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('repartidores.index') }}">Volver</a>
