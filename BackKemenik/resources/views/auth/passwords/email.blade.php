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
                            @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Por favor, ingresa tu correo electrónico</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect btn-label waves-light" type="submit"><i class="bx bx-check label-icon"></i>ENVIAR ENLACE PARA RESTABLECER</button>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="{{ route('login') }}" style="color: #0d3e66;">Cencelar / Regresar</a>
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