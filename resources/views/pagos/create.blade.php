@extends('backend.layouts.master')

@section('title', 'Registrar Pago - Panel de Administración')

@section('admin-content')
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Pagos</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.pagos.index') }}">Pagos</a></li>
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
                        <h4 class="header-title">Registrar Pago</h4>
                        @include('backend.layouts.partials.messages')

                        <form action="{{ route('admin.pagos.store') }}" method="POST">
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
                                <label for="monto">Monto</label>
                                <input type="number" name="monto" id="monto" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fecha_pago">Fecha de Pago</label>
                                <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control" required>
                                    <option value="Pagado">Pagado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Vencido">Vencido</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="metodo_pago">Método de Pago</label>
                                <select name="metodo_pago" id="metodo_pago" class="form-control" required>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input type="text" name="referencia" id="referencia" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="fecha_registro">Fecha de Registro</label>
                                <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar Pago</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
