@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Sección: {{ $seccion->nombre }}</h2>

    <!-- Formulario para editar la sección -->
    <form action="{{ route('admin.secciones.update', $seccion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Estudiantes asignados -->
        <div class="form-group">
            <label for="estudiantes">Estudiantes asignados:</label>
            <select name="estudiantes[]" id="estudiantes" class="form-control" multiple>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}"
                        @if(in_array($estudiante->id, $estudiantesAsignados)) selected @endif>
                        {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Docentes asignados -->
        <div class="form-group">
            <label for="docentes">Docentes asignados:</label>
            <select name="docentes[]" id="docentes" class="form-control" multiple>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}"
                        @if(in_array($docente->id, $docentesAsignados)) selected @endif>
                        {{ $docente->nombre }} {{ $docente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botón para guardar los cambios -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
