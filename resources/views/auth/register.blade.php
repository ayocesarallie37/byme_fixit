@extends('layouts.form')

@section('title', 'Registro')

@section('content')

<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="../../images/logo.svg" alt="logo">
                </div>
                @if($errors->any())
                    <h4 class="font-weight-light">Se encontro el siguiente error.</h4>
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ $errors->first() }}
                    </div>
                @else
                    <h4>¿Nuevo aquí?</h4>
                    <h6 class="font-weight-light">Registrarse es fácil. Solo requiere unos pocos pasos.</h6>
                @endif
                
                <form class="pt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" id="exampleInputUsername1"
                            placeholder="Nombre" name="name" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" required autocomplete="email" placeholder="Correo a asignar">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                            <option>Residente</option>
                            <option>Tecnico</option>
                            <option>Administrador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                            placeholder="Contraseña" name="password" required autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                            placeholder="Repetir contraseña" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection