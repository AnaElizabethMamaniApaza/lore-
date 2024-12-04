<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Muestra la lista de estudiantes
    public function index()
    {
        // Obtener todos los estudiantes
        $estudiantes = Estudiante::all();

        // Retorna la vista con los estudiantes
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Muestra el formulario para crear un nuevo estudiante
    public function create()
    {
        return view('estudiantes.create');
    }

    // Almacena un nuevo estudiante
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'grado' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'documento_tipo' => 'required|string|max:255',
            'documento_numero' => 'required|string|max:255',
        ]);

        // Crea un nuevo estudiante
        Estudiante::create([
            'nombre_completo' => $request->nombre_completo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo_electronico' => $request->correo_electronico,
            'grado' => $request->grado,
            'seccion' => $request->seccion,
            'fecha_hora_ingreso' => now(), // Guarda la fecha y hora actual
            'nombre_padre' => $request->nombre_padre,
            'nombre_madre' => $request->nombre_madre,
            'telefono_padre' => $request->telefono_padre,
            'telefono_madre' => $request->telefono_madre,
            'documento_tipo' => $request->documento_tipo,
            'documento_numero' => $request->documento_numero,
        ]);

        // Redirige a la lista de estudiantes con un mensaje de éxito
        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante creado exitosamente');
    }

    // Muestra el formulario para editar un estudiante
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    // Actualiza la información de un estudiante
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'grado' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'documento_tipo' => 'required|string|max:255',
            'documento_numero' => 'required|string|max:255',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update([
            'nombre_completo' => $request->nombre_completo,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo_electronico' => $request->correo_electronico,
            'grado' => $request->grado,
            'seccion' => $request->seccion,
            'fecha_hora_ingreso' => now(), // Actualiza la fecha y hora
            'nombre_padre' => $request->nombre_padre,
            'nombre_madre' => $request->nombre_madre,
            'telefono_padre' => $request->telefono_padre,
            'telefono_madre' => $request->telefono_madre,
            'documento_tipo' => $request->documento_tipo,
            'documento_numero' => $request->documento_numero,
        ]);

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante actualizado exitosamente');
    }

    // Elimina un estudiante
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('admin.estudiantes.index')->with('success', 'Estudiante eliminado exitosamente');
    }
}
