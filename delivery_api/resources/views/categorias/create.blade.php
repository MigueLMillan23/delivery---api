@extends('layouts.app')

@section('content')
<h2>Nueva Categoría</h2>
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre" required>
    <button type="submit">Guardar</button>
</form>

<a href="{{ route('dashboard') }}">Volver</a>

@endsection
