<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Curso;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('curso')->get();
        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('horarios.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'hora_recreo' => 'nullable|date_format:H:i|after:hora_inicio|before:hora_fin',
        ]);

        $horario = new Horario($request->all());
        $horario->save();

        return redirect()->route('admin.horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $cursos = Curso::all();
        return view('horarios.edit', compact('horario', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'dia' => 'required|string|max:15',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'hora_recreo' => 'nullable|date_format:H:i|after:hora_inicio|before:hora_fin',
        ]);

        $horario->fill($request->all());
        $horario->save();

        return redirect()->route('admin.horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
{
    // Eliminar el horario
    $horario->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('admin.horarios.index')->with('success', 'Horario eliminado exitosamente.');
}
}