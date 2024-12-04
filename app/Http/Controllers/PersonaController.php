<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Estudiante;
use App\Models\Docente;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::with(['estudiante', 'docente'])->get();
        return view('persona.index', compact('personas'));
    }

    public function create()
    {
        return view('persona.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'correo' => 'required|email|unique:persona',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'dni' => 'required|string|unique:persona',
        ]);

        Persona::create($request->all());

        return redirect()->route('persona.index')->with('success', 'Persona creada exitosamente.');
    }
}
