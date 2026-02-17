<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Residente;

class Notificacion extends Model
{
    protected $table = 'notificaciones';
    
    protected $fillable = [
        'residentes_id',
        'titulo',
        'mensaje',
        'leida',
        'fecha_evento'
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class, 'residentes_id');
    }
}
