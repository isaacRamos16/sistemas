<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status'; // 👈 nombre exacto de la tabla
    protected $primaryKey = 'id_status';

    public $timestamps = false;

    protected $fillable = ['descripcion'];
}
