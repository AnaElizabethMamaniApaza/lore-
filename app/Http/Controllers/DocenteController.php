<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // Mostrar el formulario para crear un nuevo docente
    public function create()
    {
        return view('docentes.create');
    }

    // Guardar un nuevo docente en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'required|email|unique:docentes',
            'materia' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'titulo_academico' => 'nullable|string|max:255',
            'experiencia_educativa' => 'nullable|string',
            'salario' => 'nullable|numeric',
            'horario' => 'nullable|string',
            'estado_contrato' => 'required|string|max:50',
            'documento_tipo' => 'required|string|max:50',  // Tipo de documento
            'documento_numero' => 'required|string|max:50|unique:docentes', // Número de documento
        ]);

        // Crear un nuevo docente
        Docente::create($request->all());

        // Redirigir a la vista de listado de docentes
        return redirect()->route('admin.docentes.index')->with('success', 'Docente creado correctamente');
    }

    // Mostrar todos los docentes
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    // Mostrar el formulario para editar un docente
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.edit', compact('docente'));
    }

    // Actualizar los datos de un docente
    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'correo_electronico' => 'required|email|unique:docentes,correo_electronico,' . $id,
            'materia' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'titulo_academico' => 'nullable|string|max:255',
            'experiencia_educativa' => 'nullable|string',
            'salario' => 'nullable|numeric',
            'horario' => 'nullable|string',
            'estado_contrato' => 'required|string|max:50',
            'documento_tipo' => 'required|string|max:50',  // Tipo de documento
            'documento_numero' => 'required|string|max:50|unique:docentes,documento_numero,' . $id, // Número de documento
        ]);

        // Encontrar y actualizar los datos del docente
        $docente = Docente::findOrFail($id);
        $docente->update($request->all());

        // Redirigir a la vista de listado de docentes
        return redirect()->route('admin.docentes.index')->with('success', 'Docente actualizado correctamente');
    }

    // Eliminar un docente
    public function destroy($id)
    {
        // Encontrar y eliminar el docente
        $docente = Docente::findOrFail($id);
        $docente->delete();

        // Redirigir a la vista de listado de docentes
        return redirect()->route('admin.docentes.index')->with('success', 'Docente eliminado correctamente');
    }
}
