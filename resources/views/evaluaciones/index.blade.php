@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Evaluaciones</h1>
    <a href="{{ route('admin.evaluaciones.create') }}" class="btn btn-primary">Agregar Evaluación</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
                <tr>
                    <td>{{ $evaluacion->curso->nombre }}</td>
                    <td>{{ $evaluacion->nombre }}</td>
                    <td>{{ $evaluacion->fecha }}</td>
                    <td>{{ ucfirst($evaluacion->tipo) }}</td>
                    <td>{{ $evaluacion->descripcion }}</td>
                    <td>
                        <a href="{{ route('admin.evaluaciones.edit', $evaluacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.evaluaciones.destroy', $evaluacion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
