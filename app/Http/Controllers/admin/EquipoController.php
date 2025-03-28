<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\EstadoEquipo;
use App\Models\TipoEquipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $equipos = \App\Models\Equipo::all(); // Trae todos los equipos desde la base de datos
        $estados = \App\Models\EstadoEquipo::all();
        $tipos = \App\Models\TipoEquipo::all();
        return view('equipo.index', compact('equipos', 'estados', 'tipos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = EstadoEquipo::all(); // ✅
        $tipos = TipoEquipo::all(); // ✅

        return view('equipo.create', compact('estados','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar campos
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'fecha_adquisicion' => 'required|date',
            'stock' => 'required|integer',
            'fecha_registro' => 'required|date',
            'id_estado_equipo' => 'required|exists:estado_equipo,id_estado_equipo',
            'id_tipo_equipo' => 'required|exists:tipo_equipo,id_tipo_equipo',
        ]);
    
        // Crear nuevo equipo
        \App\Models\Equipo::create([
            'nombre_equipo' => $request->nombre_equipo,
            'stock' => $request->stock,
            'fecha_adquisicion' => $request->fecha_adquisicion,
            'fecha_registro' => $request->fecha_registro,
            'id_estado_equipo' => $request->id_estado_equipo,
            'id_tipo_equipo' => $request->id_tipo_equipo,
        ]);
    
        return redirect()->route('admin.equipo.index')
                         ->with('success', 'Equipo registrado correctamente.');
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
    public function update(Request $request, $id)
{
    $request->validate([
        'nombre_equipo' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'id_estado_equipo' => 'required|exists:estado_equipo,id_estado_equipo',
        'id_tipo_equipo' => 'required|exists:tipo_equipo,id_tipo_equipo',
    ]);

    $equipo = Equipo::findOrFail($id);
    $equipo->update([
        'nombre_equipo' => $request->nombre_equipo,
        'stock' => $request->stock,
        'id_estado_equipo' => $request->id_estado_equipo,
        'id_tipo_equipo' => $request->id_tipo_equipo,
    ]);

    return redirect()->route('admin.equipo.index')->with('success', 'Equipo actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $equipo = \App\Models\Equipo::findOrFail($id);
    $equipo->delete();

    return redirect()->route('admin.equipo.index')->with('success', 'Equipo eliminado correctamente.');
}

}
