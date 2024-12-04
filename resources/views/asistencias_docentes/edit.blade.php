@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Asistencia de Docente</h1>
    <a href="{{ route('asistencias_docentes.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>

    <form action="{{ route('asistencias_docentes.update', $asistencia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" id="docente_id" class="form-control" disabled>
                <option value="{{ $asistencia->docente_id }}">{{ $asistencia->docente->nombre }}</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $asistencia->fecha }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="presente" {{ $asistencia->estado == 'presente' ? 'selected' : '' }}>Presente</option>
                <option value="ausente" {{ $asistencia->estado == 'ausente' ? 'selected' : '' }}>Ausente</option>
                <option value="justificado" {{ $asistencia->estado == 'justificado' ? 'selected' : '' }}>Justificado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Asistencia</button>
    </form>
</div>
@endsection
