@extends('backend.layouts.master')

@section('title', 'Lista de Estudiantes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
@endsection

@section('admin-content')
    <!-- Título y Breadcrumb -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Estudiantes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Lista de Estudiantes</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Lista de Estudiantes</h4>
                        <a class="btn btn-primary text-white float-right mb-2" href="{{ route('admin.estudiantes.create') }}">Crear Nuevo Estudiante</a>
                        <div class="clearfix"></div>

                        <!-- Mensajes de éxito/error -->
                        @include('backend.layouts.partials.messages')

                        <!-- Tabla de estudiantes -->
                        <div class="data-tables">
                            <table id="dataTable" class="table text-center">
                                <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Completo</th>
                                    <th>Grado</th>
                                    <th>Sección</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Nombre del Padre</th>
                                    <th>Nombre de la Madre</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $estudiante->nombre_completo }}</td>
                                        <td>{{ $estudiante->grado }}</td>
                                        <td>{{ $estudiante->seccion }}</td>
                                        <td>{{ $estudiante->fecha_hora_ingreso }}</td>
                                        <td>{{ $estudiante->nombre_padre }}</td>
                                        <td>{{ $estudiante->nombre_madre }}</td>
                                        <td>
                                            <a href="{{ route('admin.estudiantes.edit', $estudiante->id) }}" class="btn btn-success btn-sm">Editar</a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $estudiante->id }}').submit();">
                                                Eliminar
                                            </a>
                                            <form id="delete-form-{{ $estudiante->id }}" action="{{ route('admin.estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
