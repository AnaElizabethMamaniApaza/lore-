@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Sección</h2>
    
    <!-- Formulario para crear la sección -->
    <form action="{{ route('admin.secciones.store') }}" method="POST">
        @csrf
        
        <!-- Nombre de la sección -->
        <div class="form-group">
            <label for="nombre">Nombre de la sección:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <!-- Estudiantes asignados -->
        <div class="form-group">
            <label for="estudiantes">Estudiantes asignados:</label>
            <select name="estudiantes[]" id="estudiantes" class="form-control" multiple required>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Docentes asignados -->
        <div class="form-group">
            <label for="docentes">Docentes asignados:</label>
            <select name="docentes[]" id="docentes" class="form-control" multiple required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón para crear la sección -->
        <button type="submit" class="btn btn-primary">Crear Sección</button>
    </form>
</div>
@endsection
