@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">

                    <div class="row justify-content-center p-5">
                        <div class="col-8">
                            <img src="/assets/images/logo-light.png" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="p-0">
                            <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Confirma tu correo electrónico</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    <div class="invalid-feedback">
                                        Por favor ingresa correo electrónico
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nueva contraseña</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
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
                                <div class="mb-3">
                                    <label class="form-label">Confirmación de nueva Contraseña</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password_confirmation">
                                        <div class="invalid-feedback">
                                            Por favor repite tu contraseña
                                        </div>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect btn-label waves-light" type="submit"><i class="bx bx-check label-icon"></i>ACTUALIZAR CONTRASEÑA</button>
                                </div>
                                <div class="mt-2 d-grid">
                                    <a type="button" href="{{ url('login') }}" class="btn btn-link" style="color: #0d3e66;">Cencelar / Regresar</a>
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