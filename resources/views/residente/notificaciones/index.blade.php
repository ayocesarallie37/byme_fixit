@extends('layouts.panel')

@section('title', 'Notificaciones')

@section('content')

<div class="row">
    <div class="col-12">

        <h4 class="mb-4">Notificaciones</h4>

        @forelse($notificaciones as $notificacion)

            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-start">

                    <div>
                        <h6 class="fw-bold">
                            {{ $notificacion->titulo }}
                        </h6>

                        <p class="mb-1 text-muted">
                            {{ $notificacion->mensaje }}
                        </p>
                    </div>

                    <div class="text-muted small">
                        {{ $notificacion->created_at->diffForHumans() }}
                    </div>

                </div>
            </div>

        @empty
            <div class="text-center py-5 text-muted">
                No tienes notificaciones.
            </div>
        @endforelse

        <div class="mt-3">
            {{ $notificaciones->links() }}
        </div>

    </div>
</div>

@endsection