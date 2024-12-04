@extends('backend.layouts.master')

@section('title')
Cursos - Panel de Administración
@endsection

@section('styles')
    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')

<!-- Área de título de la página -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Cursos</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Todos los Cursos</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- Fin del área de título -->

<div class="main-content-inner">
    <div class="row">
        <!-- Comienzo de la tabla de cursos -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Listado de Cursos</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('admin.cursos.create') }}">Crear Nuevo Curso</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center table table-striped table-bordered">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Sl</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($cursos as $curso)
                               <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $curso->nombre }}</td>
                                    <td>{{ $curso->descripcion }}</td>
                                    <td>{{ $curso->fecha_inicio }}</td>
                                    <td>{{ $curso->fecha_fin }}</td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('admin.cursos.edit', $curso->id) }}">Editar</a>
                                        <a class="btn btn-danger text-white" href="{{ route('admin.cursos.destroy', $curso->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $curso->id }}').submit();">
                                            Eliminar
                                        </a>
                                        <!-- Enlace para Ver Horarios -->
                                        <a class="btn btn-info text-white" href="{{ route('admin.horarios.index', $curso->id) }}">Ver Horarios</a>

                                        <form id="delete-form-{{ $curso->id }}" action="{{ route('admin.cursos.destroy', $curso->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
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
        <!-- Fin de la tabla de cursos -->
    </div>
</div>

@endsection

@section('scripts')
    <!-- Scripts de DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script>
        /* ====================================
        Activar DataTables
        ==================================== */
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
