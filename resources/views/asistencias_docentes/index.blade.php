@extends('backend.layouts.master')

@section('title', 'Lista de Asistencias de Docentes')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Asistencias de Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>Lista de Asistencias</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title float-left">Lista de Asistencias de Docentes</h4>
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.asistencias_docentes.create') }}">Registrar Nueva Asistencia</a>
                        </p>
                        <div class="clearfix"></div>
                        <div class="data-tables">
                            @include('backend.layouts.partials.messages')
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="15%">Docente</th>
                                    <th width="10%">Fecha</th>
                                    <th width="10%">Estado</th>
                                    <th width="15%">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $asistencia->docente->nombre }}</td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>
                                            @if($asistencia->estado == 'presente')
                                                <span class="badge badge-success">Presente</span>
                                            @elseif($asistencia->estado == 'ausente')
                                                <span class="badge badge-danger">Ausente</span>
                                            @elseif($asistencia->estado == 'justificado')
                                                <span class="badge badge-warning">Justificado</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-success text-white" href="{{ route('admin.asistencias_docentes.edit', $asistencia->id) }}">Editar</a>
                                            <a class="btn btn-danger text-white" href="{{ route('admin.asistencias_docentes.destroy', $asistencia->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $asistencia->id }}').submit();">
                                                Eliminar
                                            </a>
                                            <form id="delete-form-{{ $asistencia->id }}" action="{{ route('admin.asistencias_docentes.destroy', $asistencia->id) }}" method="POST" style="display: none;">
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
            <!-- data table end -->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <script>
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }
    </script>
@endsection
