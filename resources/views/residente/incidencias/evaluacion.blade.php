@extends('layouts.panel')

@section('title', 'Evaluación de Incidencia')

@section('content')

<form action="{{ route('residente.evaluacion.store') }}" method="POST">
    @csrf

    <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">

    <h5>¿Cómo calificaría la rapidez del servicio?</h5>
    <div class="rating">
        @for($i = 1; $i <= 5; $i++) <i class="fa fa-star star" data-field="rapidez" data-value="{{ $i }}"></i>
            @endfor
    </div>
    <input type="hidden" name="rapidez" id="rapidez">

    <h5>¿Cómo calificaría la calidad del servicio?</h5>
    <div class="rating">
        @for($i = 1; $i <= 5; $i++) <i class="fa fa-star star" data-field="calidad" data-value="{{ $i }}"></i>
            @endfor
    </div>
    <input type="hidden" name="calidad" id="calidad">

    <h5>¿Cómo calificaría la atención del técnico?</h5>
    <div class="rating">
        @for($i = 1; $i <= 5; $i++) <i class="fa fa-star star" data-field="atencion" data-value="{{ $i }}"></i>
            @endfor
    </div>
    <input type="hidden" name="atencion" id="atencion">

    <textarea name="comentarios" class="form-control mt-3" placeholder="Comentarios adicionales"></textarea>

    <button class="btn btn-primary mt-3">Enviar evaluación</button>
</form>

<script>
document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('click', function () {

        let field = this.dataset.field;
        let value = this.dataset.value;

        document.getElementById(field).value = value;

        let stars = this.parentElement.querySelectorAll('.star');

        stars.forEach(s => {
            s.classList.remove('text-warning');
            if (s.dataset.value <= value) {
                s.classList.add('text-warning');
            }
        });
    });
});
</script>


@endsection
