<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('asistencias.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        Asistencia::create($request->all());

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia registrada con éxito.');
    }

    public function index()
    {
        $asistencias = Asistencia::with(['estudiante', 'curso'])->get();
        return view('asistencias.index', compact('asistencias'));
    }

    public function edit($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('asistencias.edit', compact('asistencia', 'estudiantes', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia actualizada con éxito.');
    }

    public function destroy($id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('admin.asistencias.index')->with('success', 'Asistencia eliminada con éxito.');
    }
}
