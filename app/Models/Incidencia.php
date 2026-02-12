<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $fillable = [
        'asunto',
        'descripcion',
        'ubicación',
        'prioridad',
        'estado',
        'residentes_id',
        'tecnicos_id',
        'asignado_en',
        'completado_en'
    ];

    public function resident()
    {
        return $this->belongsTo(Residente::class);
    }

    public function technician()
    {
        return $this->belongsTo(Tecnico::class);
    }
}
