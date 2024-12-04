<?php

namespace App\Http\Controllers;

use App\Models\Promedio;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Nota;
use Illuminate\Http\Request;

class PromedioController extends Controller
{
    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('promedios.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_estudiantes_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $notas = Nota::where('estudiante_id', $request->estudiante_id)
            ->where('curso_id', $request->curso_id)
            ->pluck('nota');

        if ($notas->isEmpty()) {
            return back()->with('error', 'No hay notas para este estudiante en el curso seleccionado.');
        }

        $promedio = $notas->avg();

        Promedio::updateOrCreate(
            [
                'estudiante_id' => $request->estudiante_id,
                'curso_id' => $request->curso_id,
            ],
            ['promedio' => $promedio]
        );

        return redirect()->route('promedios.index')->with('success', 'Promedio calculado con éxito.');
    }

    public function index()
    {
        $promedios = Promedio::with('estudiante', 'curso')->get();

        return view('promedios.index', compact('promedios'));
    }
}