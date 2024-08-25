@extends('layouts.app')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">

                <div class="card">
                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ __('Se ha enviado un nuevo correo electrónico de verificación') }}
                        </div>
                        @endif
                        <div class="p-0">
                            <div class="text-center">
                                <div class="row justify-content-center p-4">
                                    <div class="col-8">
                                        <img src="{{ asset('imgs/nivel2/header_principal.jpeg') }}" style="width: 100%;">
                                    </div>
                                </div>
                                <div class="avatar-md mx-auto">
                                    <div class="avatar-title rounded-circle bg-light">
                                        <i class="fa fa-envelope h1 mb-0 text-danger"></i>
                                    </div>
                                </div>
                                <div class="p-2 mt-4">
                                    <h4>¡Listo!</h4>
                                    <p>Te hemos enviado un correo electrónico de verificación</p>
                                    <p>¿No has recibido ningun correo?</p>
                                    <div class="mt-4">
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary w-md">{{ __('Volver a enviar') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection