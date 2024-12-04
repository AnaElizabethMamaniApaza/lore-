@extends('backend.layouts.master')

@section('title', 'Lista de Notas')

@section('admin-content')
<div class="container">
    <h1>Notas</h1>
    <!-- Botón para agregar estudiante y curso -->
    <a href="{{ route('admin.notas.create') }}" class="btn btn-primary mb-3">Agregar estudiante y curso</a>

    <!-- Tabla de notas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Fecha</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
            <tr>
                <td>{{ $nota->estudiante->nombre }} {{ $nota->estudiante->apellido }}</td>
                <td>{{ $nota->curso->nombre }}</td>
                    @csrf
                    @method('PUT')
                    <td>
                        <select name="nota1" class="form-control">
                            <option value="AD" {{ $nota->nota1 == 'AD' ? 'selected' : '' }}>AD</option>
                            <option value="A" {{ $nota->nota1 == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $nota->nota1 == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $nota->nota1 == 'C' ? 'selected' : '' }}>C</option>
                        </select>
                    </td>
                    <td>
                        <select name="nota2" class="form-control">
                            <option value="AD" {{ $nota->nota2 == 'AD' ? 'selected' : '' }}>AD</option>
                            <option value="A" {{ $nota->nota2 == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $nota->nota2 == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $nota->nota2 == 'C' ? 'selected' : '' }}>C</option>
                        </select>
                    </td>
                    <td>
                        <select name="nota3" class="form-control">
                            <option value="AD" {{ $nota->nota3 == 'AD' ? 'selected' : '' }}>AD</option>
                            <option value="A" {{ $nota->nota3 == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $nota->nota3 == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $nota->nota3 == 'C' ? 'selected' : '' }}>C</option>
                        </select>
                    </td>
                    <td>{{ $nota->fecha }}</td>
                    <td>
                        <input type="text" name="comentarios" value="{{ $nota->comentarios }}" class="form-control">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
