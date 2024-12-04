@extends('backend.layouts.master')

@section('title')
Detalles del Curso - Panel de Administración
@endsection

@section('admin-content')

<!-- Área de título de la página -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Detalles del Curso</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.cursos.index') }}">Cursos</a></li>
                    <li><span>{{ $curso->nombre }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- Fin del área de título -->

<div class="main-content-inner">
    <div class="row">
        <!-- Comienzo de los detalles del curso -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Detalles del Curso: {{ $curso->nombre }}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
                            <p><strong>Fecha de Inicio:</strong> {{ $curso->fecha_inicio }}</p>
                            <p><strong>Fecha de Fin:</strong> {{ $curso->fecha_fin }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.cursos.index') }}" class="btn btn-secondary mt-3">Volver al Listado</a>
                </div>
            </div>
        </div>
        <!-- Fin de los detalles del curso -->
    </div>
</div>

@endsection
