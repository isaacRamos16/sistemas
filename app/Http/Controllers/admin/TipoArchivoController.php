<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\TipoArchivo;

class TipoArchivoController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $tipo_archivo = TipoArchivo::all();
        return view('tipo_archivo.index', compact('tipo_archivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_archivo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|unique:tipo_archivo,descripcion',
        ]);

        TipoArchivo::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.tipo_archivo.index')
                         ->with('success', 'Tipo Archivo creado correctamente.');
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
        $tipo_archivo = TipoArchivo::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|string|unique:tipo_archivo,descripcion,' . $tipo_archivo->id_tipo_archivo . ',id_tipo_archivo',
        ]);

        $tipo_archivo->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.tipo_archivo.index')
                         ->with('success', 'Tipo Archivo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_archivo = TipoArchivo::findOrFail($id);
        $tipo_archivo->delete();

        return redirect()->route('admin.tipo_archivo.index')
                         ->with('success', 'Tipo Archivo eliminado correctamente.');
    }
}
