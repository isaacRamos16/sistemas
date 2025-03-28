<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{ 
    use HasFactory;

    protected $table = 'equipo'; // nombre de la tabla
    protected $primaryKey = 'id_equipo'; // clave primaria

    public $timestamps = false; // si no tienes campos created_at / updated_at

    protected $fillable = [
        'nombre_equipo',
        'id_estado_equipo',
        'stock',
        'id_tipo_equipo',
        'fecha_adquisicion',
        'fecha_registro',
    ];

    // 🔗 Relación con estado_equipo
    public function estado()
    {
        return $this->belongsTo(EstadoEquipo::class, 'id_estado_equipo', 'id_estado_equipo');
    }
    public function tipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'id_tipo_equipo', 'id_tipo_equipo');
    }


}
 