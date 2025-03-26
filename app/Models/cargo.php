<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo'; // 👈 nombre exacto de la tabla
    protected $primaryKey = 'id_cargo';

    public $timestamps = false; // si tu tabla no tiene created_at / updated_at

    protected $fillable = ['descripcion'];
}
