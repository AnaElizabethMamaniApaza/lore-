<form action="{{ route('admin.notas.store') }}" method="POST">
    @csrf  <!-- Token CSRF -->
    
    <div class="form-group">
        <label for="registro_estudiante_id">Estudiante:</label>
        <select name="registro_estudiante_id" class="form-control" required>
            <option value="">Selecciona un estudiante</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="curso_id">Curso:</label>
        <select name="curso_id" class="form-control" required>
            <option value="">Selecciona un curso</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Asignar</button>
</form>
