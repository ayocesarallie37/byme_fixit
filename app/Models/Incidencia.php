<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Residente;
use App\Models\Tecnico;
use App\Models\Evaluacion;

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

    public function residente()
    {
        return $this->belongsTo(Residente::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }

    public function evaluacion()
    {
        return $this->hasOne(Evaluacion::class);
    }
}
