<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo; 

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargo.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cargo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|unique:cargo,descripcion|max:255',
        ]);
    
        Cargo::create([
            'descripcion' => $request->descripcion,
        ]);
    
        return redirect()->route('admin.cargo.index')->with('success', 'Cargo registrado correctamente.');
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
    public function update(Request $request, Cargo $cargo)
{
    $request->validate([
        'descripcion' => 'required|string|max:255|unique:cargo,descripcion,' . $cargo->id_cargo . ',id_cargo',
    ]);

    $cargo->update([
        'descripcion' => $request->descripcion,
    ]);

    return redirect()->route('admin.cargo.index')->with('success', 'Cargo actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
    
        return redirect()->route('admin.cargo.index')->with('success', 'Cargo eliminado correctamente.');
    }
    
}
