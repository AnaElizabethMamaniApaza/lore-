@extends('backend.layouts.master')

@section('title', 'Editar Mensaje')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Mensajes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.mensajes.index') }}">Mensajes</a></li>
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
                        <h4 class="header-title">Editar Mensaje</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.mensajes.update', $mensaje->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="registro_estudiante_id">Estudiante</label>
                                <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-control" required>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}" {{ $estudiante->id == $mensaje->registro_estudiante_id ? 'selected' : '' }}>
                                            {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}" {{ $curso->id == $mensaje->curso_id ? 'selected' : '' }}>
                                            {{ $curso->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="asunto">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control" value="{{ old('asunto', $mensaje->asunto) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="contenido">Contenido</label>
                                <textarea name="contenido" id="contenido" class="form-control" required>{{ old('contenido', $mensaje->contenido) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_envio">Fecha de Envío</label>
                                <input type="datetime-local" name="fecha_envio" id="fecha_envio" class="form-control" value="{{ old('fecha_envio', $mensaje->fecha_envio) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="Enviado" {{ $mensaje->estado == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                                    <option value="Leído" {{ $mensaje->estado == 'Leído' ? 'selected' : '' }}>Leído</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
