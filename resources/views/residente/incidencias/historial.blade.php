@extends('layouts.panel')

@section('title', 'Historial de Incidencias')

@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title mb-4">Historial de reportes</h4>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th># Incidencia</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Técnico asignado</th>
                                <th>Tiempo estimado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($incidencias as $incidencia)
                                <tr>
                                    <td># 1</td>

                                    <td>
                                        16/09/2024
                                    </td>

                                    <td>General</td>

                                    <td>
                                        <span class="badge bg-success text-white px-3 py-2">
                                            Resuelto
                                        </span>
                                    </td>

                                    <td>
                                        Juan Pérez
                                    </td>

                                    <td>
                                        5 horas
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        No tienes incidencias resueltas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <!-- {{ $incidencias->links() }} -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection