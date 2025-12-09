@extends('layouts.form')

@section('title', 'Inicio de sesión')

@section('content')

<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <img src="../../images/logo.svg" alt="logo">
                </div>
                <h4>¡Hola! Vamos a iniciar</h4>
                @if($errors->any())
                    <h4 class="font-weight-light">Se encontro el siguiente error.</h4>
                    <div class="alert alert-danger mb-4" role="alert">
                        {{ $errors->first() }}
                    </div>
                @else
                    <h6 class="font-weight-light">Inicia sesión para continuar</h6>
                @endif
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                            placeholder="Correo asignado" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                            placeholder="Contraseña" name="password" required autocomplete="current-password">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">INICIAR SESION</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted" for="remember">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                Recordarme
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="auth-link text-black">¿Olvidaste tu contraseña?</a>
                    </div>
                    <!--
                    <div class="text-center mt-4 font-weight-light">
                        ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Crear</a>
                    </div>
                    -->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection