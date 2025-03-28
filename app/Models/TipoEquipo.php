<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    protected $table = 'tipo_equipo'; // 👈 nombre exacto de la tabla
    protected $primaryKey = 'id_tipo_equipo';

    public $timestamps = false;

    protected $fillable = ['descripcion'];
}
