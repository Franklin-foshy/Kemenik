<div class="modal fade" id="newUser" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content position-relative">
            <div class="modal-body p-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{ route('user-post') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="name">Nombres y Apellidos</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Escriba los nombres y apellidos" required />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input class="form-control @error('telefono') is-invalid @enderror" type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Escriba número de teléfono" required>
                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="email">Correo Electrónico</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Escriba el correo electrónico del usuario" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input class="form-control" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" placeholder="Escriba la fecha de nacimiento" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select id="sexo" class="form-select" name="sexo" required>
                                        <option value="">Selecciona tu sexo</option>
                                        <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="rut">ROL</label>
                                    <select name="rol" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Repita Contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="********" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="status">Estado</label>
                                    <select name="status" id="" class="form-select selectpicker" required>
                                        <option value="">Seleccione</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>