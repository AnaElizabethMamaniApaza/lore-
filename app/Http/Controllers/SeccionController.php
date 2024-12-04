<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\RegistroEstudiante; // Modelo de registro_estudiantes
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    // Método para agregar estudiantes a una sección
    public function agregarEstudiantes($id, Request $request)
    {
        $seccion = Seccion::findOrFail($id);

        // Verificar si ya hay 10 estudiantes asignados
        if ($seccion->estudiantes->count() >= 10) {
            return response()->json(['error' => 'La sección ya tiene el límite de estudiantes.'], 400);
        }

        // Validar el ID de los estudiantes
        $request->validate([
            'estudiantes' => 'required|array|max:10', // Asegura que no exceda los 10 estudiantes
            'estudiantes.*' => 'exists:registro_estudiantes,id', // Verifica que el estudiante exista
        ]);

        // Verificar que no superen el límite de 10 estudiantes
        $cantidadEstudiantes = $seccion->estudiantes->count() + count($request->estudiantes);
        if ($cantidadEstudiantes > 10) {
            return response()->json(['error' => 'No puedes agregar más de 10 estudiantes a la sección.'], 400);
        }

        // Agregar los estudiantes a la sección
        $seccion->estudiantes()->attach($request->estudiantes);

        return response()->json(['success' => 'Estudiantes agregados correctamente a la sección.']);
    }
}
