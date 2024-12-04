<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::with('estudiante', 'curso')->get();
        return view('mensajes.index', compact('mensajes'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('mensajes.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'asunto' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_envio' => 'required|date',
            'estado' => 'required|in:Enviado,Leído',
            'fecha_lectura' => 'nullable|date',
        ]);

        Mensaje::create($request->all());
        return redirect()->route('admin.mensajes.index')->with('success', 'Mensaje enviado correctamente.');
    }

    public function edit($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        return view('mensajes.edit', compact('mensaje', 'estudiantes', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'registro_estudiante_id' => 'required|exists:registro_estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'asunto' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_envio' => 'required|date',
            'estado' => 'required|in:Enviado,Leído',
            'fecha_lectura' => 'nullable|date',
        ]);

        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update($request->all());
        return redirect()->route('admin.mensajes.index')->with('success', 'Mensaje actualizado correctamente.');
    }

    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();
        return redirect()->route('admin.mensajes.index')->with('success', 'Mensaje eliminado correctamente.');
    }
}
