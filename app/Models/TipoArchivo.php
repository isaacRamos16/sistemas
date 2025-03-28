<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoArchivo extends Model
{
    protected $table = 'tipo_archivo'; // 👈 nombre exacto de la tabla
    protected $primaryKey = 'id_tipo_archivo';

    public $timestamps = false;

    protected $fillable = ['descripcion'];
}
 