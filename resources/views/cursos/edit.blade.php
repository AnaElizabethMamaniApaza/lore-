@extends('backend.layouts.master')

@section('title', 'Editar Curso')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Cursos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.cursos.index') }}">Cursos</a></li>
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
                        <h4 class="header-title">Editar Curso</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.cursos.update', $curso->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre del Curso</label>
                                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $curso->nombre) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" name="descripcion" rows="4" class="form-control" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', $curso->fecha_inicio) }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', $curso->fecha_fin) }}" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-warning mt-3">Actualizar Curso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
