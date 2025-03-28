<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoEquipo;

class EstadoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estado_equipo = EstadoEquipo::all();
        return view('estado-equipo.index', compact('estado_equipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado-equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:estado_equipo,descripcion'
        ]);

        EstadoEquipo::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.estado-equipo.index')
            ->with('success', 'Estado Equipo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estado = EstadoEquipo::findOrFail($id);
        return view('estado_equipo.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estado = EstadoEquipo::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|unique:estado_equipo,descripcion,' . $estado->id_estado_equipo . ',id_estado_equipo'
        ]);

        $estado->update([
            'descripcion' => $request->descripcion
        ]);

        return redirect()->route('admin.estado-equipo.index')->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        EstadoEquipo::findOrFail($id)->delete();
        return redirect()->route('admin.estado-equipo.index')->with('success', 'Estado eliminado correctamente.');
    }
}
