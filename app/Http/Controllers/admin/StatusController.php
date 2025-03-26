<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Muestra la lista de status.
     */
    public function index()
    {
        $status = Status::all();
        return view('status.index', compact('status'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Guarda un nuevo status.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|unique:status,descripcion',
        ]);

        Status::create([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.status.index')
                         ->with('success', 'Status creado correctamente.');
    }

    /**
     * Actualiza un status existente.
     */
    public function update(Request $request, string $id)
    {
        $status = Status::findOrFail($id);

        $request->validate([
            'descripcion' => 'required|string|unique:status,descripcion,' . $status->id_status . ',id_status',
        ]);

        $status->update([
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('admin.status.index')
                         ->with('success', 'Status actualizado correctamente.');
    }

    /**
     * Elimina un status.
     */
    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('admin.status.index')
                         ->with('success', 'Status eliminado correctamente.');
    }
}
