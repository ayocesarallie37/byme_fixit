<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{
    protected $fillable = [
        'user_id',
        'telefono',
        'direccion',
        'numero_departamento',
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
