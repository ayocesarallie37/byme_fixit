<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $fillable = [
        'incidencia_id',
        'residentes_id',
        'rapidez',
        'calidad',
        'atencion',
        'comentarios',
    ];

    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }
}
