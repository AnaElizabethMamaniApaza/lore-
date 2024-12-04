@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Mensajes</h1>
    <a href="{{ route('admin.mensajes.create') }}" class="btn btn-primary">Enviar Mensaje</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Asunto</th>
                <th>Fecha de Envío</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mensajes as $mensaje)
                <tr>
                    <td>{{ $mensaje->estudiante->nombre }}</td>
                    <td>{{ $mensaje->curso->nombre }}</td>
                    <td>{{ $mensaje->asunto }}</td>
                    <td>{{ $mensaje->fecha_envio }}</td>
                    <td>{{ $mensaje->estado }}</td>
                    <td>
                        <a href="{{ route('admin.mensajes.edit', $mensaje->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.mensajes.destroy', $mensaje->id) }}" method="POST" style="display:inline-block;">
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
