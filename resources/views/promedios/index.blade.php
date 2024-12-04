@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Lista de Promedios</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para ir a la página de creación de promedios -->
    <div class="mb-3">
        <a href="{{ route('admin.promedios.create') }}" class="btn btn-primary">Calcular Nuevo Promedio</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promedios as $promedio)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $promedio->estudiante->nombre }} {{ $promedio->estudiante->apellido }}</td>
                    <td>{{ $promedio->curso->nombre }}</td>
                    <td>{{ number_format($promedio->promedio, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay promedios registrados.</td>
                </tr>
            @endforelse
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