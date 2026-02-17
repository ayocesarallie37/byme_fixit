<?php

namespace App\Http\Controllers\Residente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Incidencia;
use App\Models\Residente;

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

    public function historial()
    {
        $user = auth()->user();

        $residente = Residente::where('user_id', $user->id)->first();

        if (!$residente) {
            dd('No existe registro en tabla residentes para este usuario');
        }

        $incidencias = Incidencia::with('tecnico')
            ->where('residentes_id', $residente->id)
            ->where('estado', 'resuelta')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('residente.incidencias.historial', compact('incidencias'));
    }

    public function evaluacion($id)
    {
        $incidencia = Incidencia::with('tecnico')
            ->where('id', $id)
            ->where('estado', 'resuelto')
            ->firstOrFail();

        return view('residente.incidencias.evaluacion', compact('incidencia'));
    }

    public function guardarEvaluacion(Request $request)
    {
        $request->validate([
            'incidencia_id' => 'required|exists:incidencias,id',
            'rapidez' => 'required|integer|min:1|max:5',
            'calidad' => 'required|integer|min:1|max:5',
            'atencion' => 'required|integer|min:1|max:5',
            'comentarios' => 'nullable|string'
        ]);

        $residente = auth()->user()->residente;

        Evaluacion::create([
            'incidencia_id' => $request->incidencia_id,
            'residentes_id' => $residente->id,
            'rapidez' => $request->rapidez,
            'calidad' => $request->calidad,
            'atencion' => $request->atencion,
            'comentarios' => $request->comentarios
        ]);

        return redirect()->route('residente.incidencias.historial')
            ->with('success', 'Evaluación enviada correctamente.');
    }

}
