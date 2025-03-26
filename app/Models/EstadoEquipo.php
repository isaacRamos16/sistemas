<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoEquipo extends Model
{
    use HasFactory;

    protected $table = 'estado_equipo';
    protected $primaryKey = 'id_estado_equipo';

    protected $fillable = ['descripcion'];

    public $timestamps = false; // si no tienes campos created_at / updated_at
}
