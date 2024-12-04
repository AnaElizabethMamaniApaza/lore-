<?php

namespace App\Http\Controllers;

use App\Models\AsistenciaDocente;
use App\Models\Docente;
use Illuminate\Http\Request;

class AsistenciaDocenteController extends Controller
{
    public function index()
    {
        // Carga la relación docente junto con las asistencias
        $asistencias = AsistenciaDocente::with('docente')->get();
        return view('asistencias_docentes.index', compact('asistencias'));
    }

    public function create()
    {
        // Obtén todos los docentes para el formulario de creación
        $docentes = Docente::all();
        return view('asistencias_docentes.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        // Crea la nueva asistencia con los datos del formulario
        AsistenciaDocente::create($request->only('docente_id', 'fecha', 'estado'));

        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia registrada correctamente.');
    }

    public function edit($id)
    {
        // Encuentra la asistencia y los docentes disponibles para editar
        $asistencia = AsistenciaDocente::findOrFail($id);
        $docentes = Docente::all();
        return view('asistencias_docentes.edit', compact('asistencia', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,justificado',
        ]);

        // Encuentra la asistencia a actualizar
        $asistencia = AsistenciaDocente::findOrFail($id);
        $asistencia->update($request->only('fecha', 'estado'));

        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    public function destroy($id)
    {
        // Elimina la asistencia seleccionada
        $asistencia = AsistenciaDocente::findOrFail($id);
        $asistencia->delete();

        return redirect()->route('admin.asistencias_docentes.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}
