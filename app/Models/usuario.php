<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users'; // ← este es el cambio clave

    protected $fillable = [
        'name',
        'apellido',
        'email',
        'id_cargo',
        'id_status',
        'password',
    ];
    

    // 👇 Relación con la tabla cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id_cargo');
    }

    // 👇 Relación con la tabla status
    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }
}
