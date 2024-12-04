<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $cursos = Curso::all(); 
        return view('cursos.index', compact('cursos'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        return view('cursos.create');
    }

    // Guardar un nuevo curso
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $this->validateCurso($request);

        // Crear el curso en la base de datos
        Curso::create($request->all());

        // Redirigir con mensaje de éxito
        return $this->redirectWithMessage('admin.cursos.index', 'Curso creado con éxito!');
    }

    // Mostrar un curso específico
    public function show($id)
    {
        $curso = $this->findCurso($id); 
        return view('cursos.show', compact('curso'));
    }

    // Mostrar el formulario para editar un curso
    public function edit($id)
    {
        $curso = $this->findCurso($id); 
        return view('cursos.edit', compact('curso'));
    }

    // Actualizar un curso
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $this->validateCurso($request);

        $curso = $this->findCurso($id); 
        $curso->update($request->all()); 

        // Redirigir con mensaje de éxito
        return $this->redirectWithMessage('admin.cursos.index', 'Curso actualizado con éxito!');
    }

    // Eliminar un curso
    public function destroy($id)
    {
        $curso = $this->findCurso($id); 
        $curso->delete(); 
        return $this->redirectWithMessage('admin.cursos.index', 'Curso eliminado con éxito!');
    }

    // Validación de los datos del curso
    private function validateCurso(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ]);
    }

    // Buscar un curso por su ID o devolver error 404
    private function findCurso($id)
    {
        return Curso::findOrFail($id); 
    }

    // Redirigir con mensaje de éxito
    private function redirectWithMessage($route, $message)
    {
        return redirect()->route($route)->with('success', $message);
    }
}
