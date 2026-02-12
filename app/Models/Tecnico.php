<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $fillable = [
        'user_id',
        'telefono',
        'especialidad',
        'activo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}
