@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Promedio de {{ $estudiante->nombre }} {{ $estudiante->apellido }}</h2>

    @if ($promedio !== null)
        <p>Promedio: {{ number_format($promedio, 2) }}</p>
    @else
        <p>No hay notas registradas para este estudiante.</p>
    @endif

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver a la lista de estudiantes</a>
</div>
@endsection
