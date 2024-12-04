@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Estudiantes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Grado</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->grado }}</td>
                    <td>
                        @php
                            $promedio = $estudiante->notas()->avg('nota');
                        @endphp
                        {{ $promedio !== null ? number_format($promedio, 2) : 'No disponible' }}
                    </td>
                    <td>
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
