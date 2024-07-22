@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">

                    <div class="row justify-content-center p-1">
                        <div class="col-8">
                            <a href="/"><img src="assets/images/logo-light.png" alt="" class="img-fluid"></a>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="p-0">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="username" autofocus>
                                        <div class="invalid-feedback">
                                            Por favor ingresa correo electrónico
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        <div class="invalid-feedback">
                                            Por favor ingresa contraseña
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
                                        {{ __('Olvide mi contraseña') }}
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
</div>
@endsection