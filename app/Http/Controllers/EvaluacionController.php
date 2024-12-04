<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    // Mostrar todas las evaluaciones
    public function index()
    {
        $evaluaciones = Evaluacion::all(); // Obtener todas las evaluaciones
        return view('evaluaciones.index', compact('evaluaciones')); // Pasamos las evaluaciones a la vista
    }

    // Mostrar el formulario para crear una nueva evaluación
    public function create()
    {
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('evaluaciones.create', compact('cursos')); // Pasamos los cursos a la vista
    }

    // Almacenar una nueva evaluación
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'tipo' => 'required|in:examen,tarea,exposicion',
            'descripcion' => 'nullable|string',
        ]);

        // Crear la nueva evaluación
        Evaluacion::create([
            'curso_id' => $request->curso_id,
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.evaluaciones.index')->with('success', 'Evaluación creada correctamente.');
    }

    // Mostrar el formulario para editar una evaluación
    public function edit($id)
    {
        $evaluacion = Evaluacion::findOrFail($id); // Buscar la evaluación por su id
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('evaluaciones.edit', compact('evaluacion', 'cursos')); // Pasamos la evaluación y los cursos a la vista
    }

    // Actualizar una evaluación
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'tipo' => 'required|in:examen,tarea,exposicion',
            'descripcion' => 'nullable|string',
        ]);

        // Buscar la evaluación por su id
        $evaluacion = Evaluacion::findOrFail($id);
        // Actualizar los datos de la evaluación
        $evaluacion->update([
            'curso_id' => $request->curso_id,
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.evaluaciones.index')->with('success', 'Evaluación actualizada correctamente.');
    }

    // Eliminar una evaluación
    public function destroy($id)
    {
        // Buscar la evaluación por su id
        $evaluacion = Evaluacion::findOrFail($id);
        // Eliminar la evaluación
        $evaluacion->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.evaluaciones.index')->with('success', 'Evaluación eliminada correctamente.');
    }
}
