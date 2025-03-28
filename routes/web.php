<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\admin\usuariosController;
use App\Http\Controllers\admin\CargoController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\EstadoEquipoController;
use App\Http\Controllers\admin\EquipoController;
use App\Http\Controllers\admin\TipoEquipoController;
use App\Http\Controllers\admin\TipoArchivoController;
use App\Http\Controllers\admin\ArchivosController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified']) 
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // ✅ CRUD de usuarios
    Route::get('admin/usuarios', [usuariosController::class, 'index'])->name('admin.usuarios.index');
    Route::get('admin/usuarios/create', [usuariosController::class, 'create'])->name('admin.usuarios.create');
    Route::post('admin/usuarios', [usuariosController::class, 'store'])->name('admin.usuarios.store');
    Route::put('admin/usuarios/{usuario}', [usuariosController::class, 'update'])->name('admin.usuarios.update');
    Route::delete('admin/usuarios/{usuario}', [usuariosController::class, 'destroy'])->name('admin.usuarios.destroy');

    Route::get('admin/cargo/create', [CargoController::class, 'create'])->name('admin.cargo.create');
    Route::post('admin/cargo', [CargoController::class, 'store'])->name('admin.cargo.store');
    Route::put('/admin/cargos/{cargo}', [CargoController::class, 'update'])->name('admin.cargos.update');
    Route::delete('/admin/cargo/{cargo}', [CargoController::class, 'destroy'])->name('admin.cargo.destroy');



    Route::get('admin/status/create', [StatusController::class, 'create'])->name('admin.status.create');
    Route::post('admin/status', [StatusController::class, 'store'])->name('admin.status.store');
    Route::put('/admin/status/{status}', [StatusController::class, 'update'])->name('admin.status.update');
    Route::delete('/admin/status/{status}', [StatusController::class, 'destroy'])->name('admin.status.destroy');
    


    
    Route::get('admin/estado-equipo/create', [EstadoEquipoController::class, 'create'])->name('admin.estado-equipo.create');
    Route::post('admin/estado-equipo', [EstadoEquipoController::class, 'store'])->name('admin.estado-equipo.store');
    Route::put('/admin/estado-equipo/{estado-equipo}', [EstadoEquipoController::class, 'update'])->name('admin.estado-equipo.update');
    Route::delete('/admin/estado-equipo/{estado-equipo}', [EstadoEquipoController::class, 'destroy'])->name('admin.estado-equipo.destroy');
    

    
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('usuarios', usuariosController::class);
        Route::resource('cargo', CargoController::class); // ✅ Esta línea es clave
        Route::resource('status', StatusController::class); // ✅ Esta línea es clave
        Route::resource('estado-equipo', EstadoEquipoController::class);
        Route::resource('equipo', EquipoController::class);
        Route::resource('tipo_equipo', TipoEquipoController::class);
        Route::resource('tipo_archivo', TipoArchivoController::class);
        Route::resource('archivos', ArchivosController::class);

    
        
        
    });

});

require __DIR__.'/auth.php'; 
 
