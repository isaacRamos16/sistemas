<?php

use App\Http\Controllers\admin\usuariosController;
use Illuminate\Support\Facades\Route;

Route::resource('usuarios', usuariosController::class);

?>