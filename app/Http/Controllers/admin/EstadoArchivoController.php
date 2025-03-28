<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoArchivo;

class EstadoArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estado_archivo = EstadoArchivo::all();
        return view('estado_archivo.index', compact('estado_archivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estado_archivo = EstadoArchivo::all();
        return view('estado_archivo.create', compact('estado_archivo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|unique:estado_archivo,descripcion',
        ]);

        EstadoArchivo::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.estado_archivo.index')
            ->with('success', 'Estado Archivo creado correctamente.');
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
        $estado_archivo = EstadoArchivo::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|string|unique:estado_archivo,descripcion,' . $estado_archivo->id_estado_archivo . ',id_estado_archivo',
        ]);

        $estado_archivo->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.estado_archivo.index')
            ->with('success', 'Estado Archivo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
