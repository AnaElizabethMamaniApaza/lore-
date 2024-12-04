@extends('backend.layouts.master')

@section('title', 'Crear Nuevo Docente')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Docentes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.docentes.index') }}">Docentes</a></li>
                        <li><span>Crear</span></li>
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
                        <h4 class="header-title">Crear Nuevo Docente</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.docentes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_completo">Nombre Completo</label>
                                <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="{{ old('nombre_completo') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
                            </div>
                            <div class="form-group">
                                <label for="correo_electronico">Correo Electrónico</label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="materia">Materia</label>
                                <input type="text" name="materia" id="materia" class="form-control" value="{{ old('materia') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_contratacion">Fecha de Contratación</label>
                                <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" value="{{ old('fecha_contratacion') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="titulo_academico">Título Académico</label>
                                <input type="text" name="titulo_academico" id="titulo_academico" class="form-control" value="{{ old('titulo_academico') }}">
                            </div>
                            <div class="form-group">
                                <label for="experiencia_educativa">Experiencia Educativa</label>
                                <textarea name="experiencia_educativa" id="experiencia_educativa" class="form-control" rows="3">{{ old('experiencia_educativa') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="salario">Salario</label>
                                <input type="number" name="salario" id="salario" class="form-control" value="{{ old('salario') }}">
                            </div>
                            <div class="form-group">
                                <label for="horario">Horario</label>
                                <input type="text" name="horario" id="horario" class="form-control" value="{{ old('horario') }}">
                            </div>
                            <div class="form-group">
                                <label for="estado_contrato">Estado del Contrato</label>
                                <input type="text" name="estado_contrato" id="estado_contrato" class="form-control" value="{{ old('estado_contrato') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="documento_tipo">Tipo de Documento</label>
                                <input type="text" name="documento_tipo" id="documento_tipo" class="form-control" value="{{ old('documento_tipo') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="documento_numero">Número de Documento</label>
                                <input type="text" name="documento_numero" id="documento_numero" class="form-control" value="{{ old('documento_numero') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
