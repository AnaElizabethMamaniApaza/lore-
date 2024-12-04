<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<div class="container">
    <h1>{{ isset($usuario) ? 'Editar' : 'Agregar' }} Usuario</h1>

    <form action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" method="POST">
        @csrf
        @if (isset($usuario))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $usuario->nombre ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $usuario->email ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" {{ !isset($usuario) ? 'required' : '' }}>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($usuario) ? 'Actualizar' : 'Crear' }}</button>
    </form>
  </div>
</html>

