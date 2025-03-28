<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    protected $table = 'archivos'; // nombre de la tabla
    protected $primaryKey = 'id_tipo_archivo'; // clave primaria

    public $timestamps = false; // si no tienes campos created_at / updated_at

    protected $fillable = [
        'id_tipo_archivo',
        'descripcion_archivo',
        'file',
        'fecha_registro',        
    ];

    // 🔗 Relación con estado_equipo
    public function TipoArchivo()
    {
        return $this->belongsTo(TipoArchivo::class, 'id_tipo_archivo', 'id_tipo_archivo');
    }
}
  