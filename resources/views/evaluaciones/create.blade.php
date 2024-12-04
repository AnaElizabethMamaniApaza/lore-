@extends('backend.layouts.master')

@section('title', 'Crear Evaluación - Panel de Administración')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Evaluaciones</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.evaluaciones.index') }}">Evaluaciones</a></li>
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
                        <h4 class="header-title">Crear Nueva Evaluación</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.evaluaciones.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre de la Evaluación</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tipo">Tipo de Evaluación</label>
                                <select name="tipo" id="tipo" class="form-control" required>
                                    <option value="examen">Examen</option>
                                    <option value="tarea">Tarea</option>
                                    <option value="exposicion">Exposición</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar Evaluación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
