@extends('backend.layouts.master')

@section('title', 'Editar Estudiante')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Estudiantes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.estudiantes.index') }}">Estudiantes</a></li>
                        <li><span>Editar</span></li>
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
                        <h4 class="header-title">Editar Estudiante</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.estudiantes.update', $estudiante->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre_completo">Nombre Completo</label>
                                <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="{{ old('nombre_completo', $estudiante->nombre_completo) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $estudiante->direccion) }}">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $estudiante->telefono) }}">
                            </div>

                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico', $estudiante->correo_electronico) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="grado">Grado</label>
                                <input type="text" name="grado" id="grado" class="form-control" value="{{ old('grado', $estudiante->grado) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="seccion">Sección</label>
                                <input type="text" name="seccion" id="seccion" class="form-control" value="{{ old('seccion', $estudiante->seccion) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso</label>
                                <input type="datetime-local" name="fecha_ingreso" id="fecha_ingreso" class="form-control"
                                       value="{{ old('fecha_ingreso', $estudiante->fecha_hora_ingreso ? $estudiante->fecha_hora_ingreso->format('Y-m-d\TH:i') : '') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nombre_padre">Nombre del Padre</label>
                                <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" value="{{ old('nombre_padre', $estudiante->nombre_padre) }}">
                            </div>

                            <div class="form-group">
                                <label for="nombre_madre">Nombre de la Madre</label>
                                <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" value="{{ old('nombre_madre', $estudiante->nombre_madre) }}">
                            </div>

                            <div class="form-group">
                                <label for="telefono_padre">Teléfono del Padre</label>
                                <input type="text" name="telefono_padre" id="telefono_padre" class="form-control" value="{{ old('telefono_padre', $estudiante->telefono_padre) }}">
                            </div>

                            <div class="form-group">
                                <label for="telefono_madre">Teléfono de la Madre</label>
                                <input type="text" name="telefono_madre" id="telefono_madre" class="form-control" value="{{ old('telefono_madre', $estudiante->telefono_madre) }}">
                            </div>

                            <div class="form-group">
                                <label for="documento_tipo">Tipo de Documento</label>
                                <input type="text" name="documento_tipo" id="documento_tipo" class="form-control" value="{{ old('documento_tipo', $estudiante->documento_tipo) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="documento_numero">Número de Documento</label>
                                <input type="text" name="documento_numero" id="documento_numero" class="form-control" value="{{ old('documento_numero', $estudiante->documento_numero) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
