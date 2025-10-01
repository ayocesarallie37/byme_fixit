@extends('layouts.form')

@section('title', 'Registrate')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="../../images/logo.svg" alt="logo">
                    </div>
                    @if($errors->any())
                        <h6 class="font-weight-light text-center">Se encontro el siguiente error.</h6>
                        <div class="alert alert-danger mb-4">{{ $errors->first() }}</div>
                    @else
                        <h4>¿Nuevo aquí?</h4>
                        <h6 class="font-weight-light">Registrarte es muy fácil. Te tomará unos pasos.</h6>
                    @endif
                    <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="exampleInputUsername1"
                                placeholder="Nombre y Apellido" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                placeholder="Correo" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <select name="role" class="form-control form-control-lg" id="role" required>
                                <option value="" disabled selected>Selecciona un rol</option>
                                <option value="residente">Residente</option>
                                <option value="tecnico">Técnico</option>
                                <option value="administrador">Administrador</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                placeholder="Contraseña" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                placeholder="Repetir Contraseña" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
@endsection