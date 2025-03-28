<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\TipoEquipo;

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_equipo = TipoEquipo::all();
        return view('tipo_equipo.index', compact('tipo_equipo'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_equipo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|unique:tipo_equipo,descripcion',
        ]);

        TipoEquipo::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.tipo_equipo.index')
                         ->with('success', 'Tipo Equipo creado correctamente.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo_equipo = TipoEquipo::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|string|unique:tipo_equipo,descripcion,' . $tipo_equipo->id_tipo_equipo . ',id_tipo_equipo',
        ]);

        $tipo_equipo->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.tipo_equipo.index')
                         ->with('success', 'Tipo equipo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_equipo = TipoEquipo::findOrFail($id);
        $tipo_equipo->delete();

        return redirect()->route('admin.tipo_equipo.index')
                         ->with('success', 'Tipo equipo eliminado correctamente.');
    }
}
