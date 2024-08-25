@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">

                    <div class="row justify-content-center p-1">
                        <div class="col-8">
                            <a href="/"><img src="{{ asset('imgs/nivel2/header_principal.jpeg') }}" style="width: 100%;"></a>
                        </div>
                    </div>

                    @if (session('message'))
                    <div style="color:red" class="alert alert-{{ session('icon') }} text-center">
                        {{ session('message') }}
                    </div>
                    @endif

                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <div class="col-md-12">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autofocus maxlength="8" pattern="\d{8}">
                                    <div class="invalid-feedback">
                                        Por favor ingresa tu número de teléfono (8 dígitos)
                                    </div>
                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    <div class="invalid-feedback">
                                        Por favor ingresa tu contraseña
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect btn-label waves-light" type="submit"><i class="bx bx-check label-icon"></i>INICIAR SESIÓN</button>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #0d3e66;">
                                    {{ __('Olvidé mi contraseña') }}
                                </a>
                                @endif
                            </div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('register') }}" style="color: #0d3e66;">¿No tienes una cuenta? <strong>Crear Nueva</strong></a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection