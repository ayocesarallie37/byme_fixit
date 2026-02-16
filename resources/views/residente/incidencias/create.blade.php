@extends('layouts.panel')

@section('title', 'Crear Incidencia')

@section('content')

<div class="col-10 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Registro de incidencia</h4>
            <p class="card-description">
                Reporta tus incidencias para que el personal de mantenimiento pueda atenderlas lo antes posible. Asegúrate de proporcionar detalles claros y adjuntar fotos si es necesario para una mejor comprensión del problema.
            </p>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleSelectGender">Tipo de incidencia</label>
                    <select class="form-control" id="exampleSelectGender">
                        <option>Mantenimiento</option>
                        <option>Reparación</option>
                        <option>Instalación</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Ubicación</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Ubicación">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Asunto de la incidencia</label>
                    <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Asunto">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Descripción de la incidencia</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Fotos de la incidencia</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Subir imagen">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Subir</button>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Crear</button>
                <button class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
</div>

@endsection