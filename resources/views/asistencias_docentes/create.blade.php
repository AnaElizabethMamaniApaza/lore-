@extends('backend.layouts.master')

@section('title', 'Registrar Asistencia de Docente')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Asistencias de Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.asistencias_docentes.index') }}">Listado de Asistencias</a></li>
                        <li><span>Registrar</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Registrar Nueva Asistencia de Docente</h4>
                        <a href="{{ route('admin.asistencias_docentes.index') }}" class="btn btn-secondary mb-3">Volver al Listado</a>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.asistencias_docentes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="docente_id">Docente</label>
                                <select name="docente_id" id="docente_id" class="form-control" required>
                                    <option value="">Seleccione un docente</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="presente" {{ old('estado') == 'presente' ? 'selected' : '' }}>Presente</option>
                                    <option value="ausente" {{ old('estado') == 'ausente' ? 'selected' : '' }}>Ausente</option>
                                    <option value="justificado" {{ old('estado') == 'justificado' ? 'selected' : '' }}>Justificado</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Registrar Asistencia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos para mejorar la visibilidad del select -->
    <style>
        select {
            background-color: white;
            color: black;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
        }

        select option {
            background-color: white;
            color: black;
        }

        /* Estilo para el label */
        label {
            font-weight: bold;
        }
    </style>

@endsection
