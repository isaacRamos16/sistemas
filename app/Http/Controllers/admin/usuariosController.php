<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Cargo;
use App\Models\Status;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::with(['cargo', 'status'])->get();
        $cargos = Cargo::all();
        $statuses = Status::all();

        return view('admin.usuarios.index', compact('usuarios', 'cargos', 'statuses'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $cargos = Cargo::all();
        $statuses = Status::all();

        return view('admin.usuarios.create', compact('cargos', 'statuses'));
    }

    /**
     * Almacena un nuevo usuario.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'id_cargo' => 'required|exists:cargo,id_cargo',
            'id_status' => 'required|exists:status,id_status',
        ]);

        Usuario::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_cargo' => $request->id_cargo,
            'id_status' => $request->id_status,
        ]);

        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Actualiza un usuario existente.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|min:6',
            'id_cargo' => 'required|exists:cargo,id_cargo',
            'id_status' => 'required|exists:status,id_status',
        ]);

        $data = [
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'id_cargo' => $request->id_cargo,
            'id_status' => $request->id_status,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $usuario->update($data);

        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario (a implementar).
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
    
        return redirect()->route('admin.usuarios.index')
                         ->with('success', 'Usuario eliminado correctamente.');
    }
    
}
