<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoArchivo extends Model
{
    protected $table = 'estado_archivo';
    protected $primaryKey = 'id_estado_archivo';

    protected $fillable = ['descripcion'];

    public $timestamps = false; // si no tienes campos created_at / updated_at
}
