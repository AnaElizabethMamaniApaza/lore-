@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
<div class="container">
    <h1>Pagos</h1>
    <a href="{{ route('admin.pagos.create') }}" class="btn btn-primary">Registrar Pago</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Estado</th>
                <th>Método de Pago</th>
                <th>Referencia</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->estudiante->nombre }} {{ $pago->estudiante->apellido }}</td>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->fecha_pago }}</td>
                    <td>{{ $pago->estado }}</td>
                    <td>{{ $pago->metodo_pago }}</td>
                    <td>{{ $pago->referencia }}</td>
                    <td>{{ $pago->fecha_registro }}</td>
                    <td>
                        <form action="{{ route('admin.pagos.destroy', $pago->id) }}" method="POST" style="display:inline-block;">
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