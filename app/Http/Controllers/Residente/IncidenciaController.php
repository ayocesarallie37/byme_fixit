<?php

namespace App\Http\Controllers\Residente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index()
    {
        return view('residente.incidencias.index');
    }

    public function create()
    {
        return view('residente.incidencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required|min:5|max:255',
            'descripcion' => 'required|min:10',
            'ubicación' => 'nullable|max:255',
            'prioridad' => 'required|in:baja,media,alta'
        ]);

        // Obtener registro del residente
        $resident = auth()->user()->resident;

        if (!$resident) {
            abort(403, 'No existe perfil de residente.');
        }

        Incidencia::create([
            'asunto' => $request->asunto,
            'descripcion' => $request->descripcion,
            'ubicación' => $request->ubicación,
            'prioridad' => $request->prioridad,
            'residentes_id' => $resident->id,
        ]);

        return redirect()
            ->route('residente.incidencias.create')
            ->with('success', 'Incidencia reportada correctamente.');
    }

    public function show($id)
    {
        // Lógica para mostrar los detalles de una incidencia específica
    }

    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición de una incidencia
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar una incidencia existente
    }

    public function destroy($id)
    {
        // Lógica para eliminar una incidencia
    }
}
