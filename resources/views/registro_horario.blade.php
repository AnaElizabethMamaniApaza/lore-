<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros de Horario</h1>
    <a href="{{ route('registro_horario.create') }}" class="btn btn-primary">Agregar Registro</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha y Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->usuario->nombre }}</td>
                <td>{{ $registro->fecha_hora }}</td>
                <td>
                    <a href="{{ route('registro_horario.edit', $registro->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('registro_horario.destroy', $registro->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</html>
