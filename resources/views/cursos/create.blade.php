@extends('backend.layouts.master')

@section('title', 'Crear Curso - Panel de Administración')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Cursos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.cursos.index') }}">Cursos</a></li>
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
                        <h4 class="header-title">Crear Nuevo Curso</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.cursos.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre del Curso</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required>{{ old('descripcion') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Inicio</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio') }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_fin">Fecha de Fin</label>
                                <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin') }}" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Crear Curso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
