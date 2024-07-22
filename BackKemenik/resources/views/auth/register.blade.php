@extends('layouts.app')

@section('content')
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
                        <form action="{{ route('user-register') }}" method="post" autocomplete="off" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-1">
                                <label for="" class="form-label">Nombres y apellidos completos</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <div class="invalid-feedback">
                                    Por favor ingresa nombres y apellidos completos
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="" class="form-label">Correo electrónico</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div class="invalid-feedback">
                                    Por favor ingresa correo electrónico
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="invalid-feedback">
                                    Por favor ingresa contraseña
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="" class="form-label">Repita Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="invalid-feedback">
                                    Por favor repite tu contraseña
                                </div>
                            </div>
                            <div style="display: none;">
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="rut">Rol</label>
                                        <select name="rol" class="form-select selectpicker" required>
                                            <option value="2">Usuario Final</option>
                                        </select>
                                        </select>@error('rol') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="status">Estado</label>
                                        <select name="status" class="form-select selectpicker" required>
                                            <option value="1">Activo</option>
                                        </select>@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Acepto los <a data-bs-toggle="modal" data-bs-target="#myModal">Terminos de uso</a>
                                </label>
                                <div class="invalid-feedback">
                                    Por favor acepta los terminos y condiciones
                                </div>
                            </div>

                            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Terminos y condiciones</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Detalles</h5>
                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                Cras justo odio, dapibus ac facilisis in,
                                                egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor
                                                fringilla.</p>
                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                Cras justo odio, dapibus ac facilisis in,
                                                egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur.
                                                Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor
                                                fringilla.</p>
                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                Cras justo odio, dapibus ac facilisis in,
                                                egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 d-grid">
                                <button class="btn btn-primary waves-effect btn-label waves-light" type="submit"><i class="bx bx-check label-icon"></i>REGISTRAR</button>
                            </div>
                        </form>
                        <div class="mt-4 text-center">
                            <a href="{{ route('login') }}" style="color: #0d3e66;">¿Ya tienes una cuenta? <strong>Iniciar Sesión</strong></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection