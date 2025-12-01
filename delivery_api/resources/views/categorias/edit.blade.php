@extends('layouts.app')

@section('content')
<h2>Editar Categoría</h2>
<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $categoria->nombre }}" required>
    <button type="submit">Actualizar</button>
</form>
<a href="{{ route('dashboard') }}">Volver</a>

@endsection
