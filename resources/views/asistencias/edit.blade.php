@extends('backend.layouts.master')

@section('title', 'Editar Asistencia')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
    <div class="container">
        <h1>Editar Asistencia</h1>

        <form action="{{ route('admin.asistencias.update', $asistencia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="estudiante_id">Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                    <option value="">Seleccionar Estudiante</option>
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" {{ $asistencia->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                            {{ $estudiante->nombre_completo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="curso_id">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control" required>
                    <option value="">Seleccionar Curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ $asistencia->curso_id == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $asistencia->fecha }}" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" value="{{ $asistencia->hora }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="presente" {{ $asistencia->estado == 'presente' ? 'selected' : '' }}>Presente</option>
                    <option value="ausente" {{ $asistencia->estado == 'ausente' ? 'selected' : '' }}>Ausente</option>
                    <option value="justificado" {{ $asistencia->estado == 'justificado' ? 'selected' : '' }}>Justificado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar Asistencia</button>
            <a href="{{ route('admin.asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
@endsection
