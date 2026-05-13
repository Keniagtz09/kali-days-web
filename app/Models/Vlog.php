<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlog extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     * * Estos deben coincidir exactamente con los nombres que 
     * pusiste en tu archivo de migración (Paso 8).
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'url_video',
        'fecha_publicacion',
    ];
}