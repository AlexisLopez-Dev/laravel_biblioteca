<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model {

    protected $fillable = [
        'titulo',
        'autor',
        'portada',
        'genero',
        'anyo_publicacion',
        'formato',
        'estado_lectura',
        'puntuacion',
        'favorito',
        'opinion',
        'prestado_a',
        'fecha_prestamo'
    ];

}
