@extends('backend.layouts.master')

@section('title', 'Editar Evaluación')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Evaluaciones</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.evaluaciones.index') }}">Evaluaciones</a></li>
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
                        <h4 class="header-title">Editar Evaluación</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.evaluaciones.update', $evaluacion->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}" {{ $curso->id == $evaluacion->curso_id ? 'selected' : '' }}>
                                            {{ $curso->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre de la Evaluación</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $evaluacion->nombre }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" class="form-control" value="{{ $evaluacion->fecha }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tipo">Tipo de Evaluación</label>
                                <select name="tipo" id="tipo" class="form-control" required>
                                    <option value="examen" {{ $evaluacion->tipo == 'examen' ? 'selected' : '' }}>Examen</option>
                                    <option value="tarea" {{ $evaluacion->tipo == 'tarea' ? 'selected' : '' }}>Tarea</option>
                                    <option value="exposicion" {{ $evaluacion->tipo == 'exposicion' ? 'selected' : '' }}>Exposición</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control">{{ $evaluacion->descripcion }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar Evaluación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
