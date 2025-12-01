<h2>Nuevo Cliente</h2>
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <button type="submit">Guardar</button>
</form>
<a href="{{ route('clientes.index') }}">Volver</a>
