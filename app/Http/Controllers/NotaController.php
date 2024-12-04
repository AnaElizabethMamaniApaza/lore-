<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante; // Importa el modelo Estudiante
use App\Models\Curso;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    // Mostrar todas las notas
    public function index()
    {
        $notas = Nota::all(); // Obtener todas las notas
        return view('notas.index', compact('notas')); // Pasamos las notas a la vista
    }

    // Mostrar el formulario para asignar un estudiante y un curso
    public function create()
    {
        $estudiantes = Estudiante::all(); // Obtener todos los estudiantes
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('notas.create', compact('estudiantes', 'cursos')); // Pasamos los estudiantes y cursos a la vista
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'registro_estudiante_id' => 'required|exists:estudiantes,id', // Verifica que el estudiante existe
        'curso_id' => 'required|exists:cursos,id', // Verifica que el curso existe
    ]);

    // Crear una nueva relación con las notas vacías
    Nota::create([
        'registro_estudiante_id' => $request->registro_estudiante_id, // Asegúrate de que este campo coincida
        'curso_id' => $request->curso_id, // Asegúrate de que este campo coincida
        'nota1' => null,
        'nota2' => null,
        'nota3' => null,
        'fecha' => now(),
        'comentarios' => null,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('admin.notas.index')->with('success', 'Estudiante y curso asignados correctamente.');
}

    

    // Mostrar el formulario para editar notas y comentarios
    public function edit($id)
    {
        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        return view('notas.edit', compact('nota')); // Pasamos la nota a la vista
    }

    // Actualizar las notas y comentarios
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nota1' => 'required|in:AD,A,B,C', // Notas deben ser AD, A, B o C
            'nota2' => 'required|in:AD,A,B,C',
            'nota3' => 'required|in:AD,A,B,C',
            'comentarios' => 'nullable|string|max:255', // Comentarios opcionales
        ]);

        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        // Actualizar las notas y comentarios
        $nota->update([
            'nota1' => $request->nota1,
            'nota2' => $request->nota2,
            'nota3' => $request->nota3,
            'comentarios' => $request->comentarios,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('notas.index')->with('success', 'Notas actualizadas correctamente.');
    }

    // Eliminar una nota
    public function destroy($id)
    {
        // Buscar la nota por su id
        $nota = Nota::findOrFail($id);
        // Eliminar la nota
        $nota->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('notas.index')->with('success', 'Nota eliminada correctamente.');
    }
}
