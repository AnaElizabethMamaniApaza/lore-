<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($registro) ? 'Editar' : 'Agregar' }} Registro de Curso</h1>

    <form action="{{ isset($registro) ? route('registro_curso.update', $registro->id) : route('registro_curso.store') }}" method="POST">
        @csrf
        @if (isset($registro))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="usuario_id">Usuario</label>
            <select name="usuario_id" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ (isset($registro) && $registro->usuario_id == $usuario->id) ? 'selected' : '' }}>
                        {{ $usuario->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="curso_id">Curso</label>
            <select name="curso_id" class="form-control" required>
                @foreach ($cursos as $curso) <!-- Asegúrate de tener los cursos disponibles -->
                    <option value="{{ $curso->id }}" {{ (isset($registro) && $registro->curso_id == $curso->id) ? 'selected' : '' }}>
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inscripcion">Fecha de Inscripción</label>
            <input type="date" class="form-control" name="fecha_inscripcion" value="{{ $registro->fecha_inscripcion ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($registro) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>
</html>
