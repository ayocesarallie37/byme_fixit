<?php

namespace App\Http\Controllers\Residente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\Notificacion;


class NotificacionController extends Controller
{
    public function index()
    {
        $residente = auth()->user()->residente;

        $notificaciones = Notificacion::where('residentes_id', $residente->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('residente.notificaciones.index', compact('notificaciones'));
    }
}
