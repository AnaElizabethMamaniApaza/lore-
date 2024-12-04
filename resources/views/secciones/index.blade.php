@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Secciones</h2>
    
    <!-- Lista de secciones -->
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($secciones as $seccion)
                <tr>
                    <td>{{ $seccion->nombre }}</td>
                    <td>
                        <a href="{{ route('admin.secciones.edit', $seccion->id) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
