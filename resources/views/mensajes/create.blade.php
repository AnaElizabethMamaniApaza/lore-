@extends('backend.layouts.master')

@section('title', 'Enviar Mensaje - Panel de Administración')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Mensajes</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.mensajes.index') }}">Mensajes</a></li>
                        <li><span>Enviar</span></li>
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
                        <h4 class="header-title">Enviar Nuevo Mensaje</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.mensajes.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="registro_estudiante_id">Estudiante</label>
                                <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-control" required>
                                    @foreach($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="curso_id">Curso</label>
                                <select name="curso_id" id="curso_id" class="form-control" required>
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="asunto">Asunto</label>
                                <input type="text" name="asunto" id="asunto" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="contenido">Contenido</label>
                                <textarea name="contenido" id="contenido" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_envio">Fecha de Envío</label>
                                <input type="datetime-local" name="fecha_envio" id="fecha_envio" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="Enviado">Enviado</option>
                                    <option value="Leído">Leído</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Enviar Mensaje</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
