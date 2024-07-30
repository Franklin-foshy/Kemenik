<div class="modal fade" id="editUser{{ $user->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content position-relative">
            <div class="modal-body p-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Editar Usuario: {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{ route('user-edit-post', $user->id) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="name">Nombres y Apellidos</label>
                                    <input class="form-control" type="text" name="name" placeholder="Escriba los nombres y apellidos" required value="{{ $user->name }}" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input class="form-control  @error('telefono') is-invalid @enderror" type="text" name="telefono" placeholder="Escriba número de teléfono" required value="{{ $user->telefono }}">
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
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Escriba el correo electrónico del usuario" value="{{ $user->email }}" />
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
                                    <input class="form-control" type="date" name="fecha_nacimiento" placeholder="Escriba la fecha de nacimiento" required value="{{ $user->fecha_nacimiento }}">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="departamento">Departamento</label>
                                    <select name="departamento" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="Alta Verapaz" @if ($user->departamento == 'Alta Verapaz') selected @endif>Alta Verapaz</option>
                                        <option value="Baja Verapaz" @if ($user->departamento == 'Baja Verapaz') selected @endif>Baja Verapaz</option>
                                        <option value="Chimaltenango" @if ($user->departamento == 'Chimaltenango') selected @endif>Chimaltenango</option>
                                        <option value="Chiquimula" @if ($user->departamento == 'Chiquimula') selected @endif>Chiquimula</option>
                                        <option value="El Progreso" @if ($user->departamento == 'El Progreso') selected @endif>El Progreso</option>
                                        <option value="Escuintla" @if ($user->departamento == 'Escuintla') selected @endif>Escuintla</option>
                                        <option value="Guatemala" @if ($user->departamento == 'Guatemala') selected @endif>Guatemala</option>
                                        <option value="Huehuetenango" @if ($user->departamento == 'Huehuetenango') selected @endif>Huehuetenango</option>
                                        <option value="Izabal" @if ($user->departamento == 'Izabal') selected @endif>Izabal</option>
                                        <option value="Jalapa" @if ($user->departamento == 'Jalapa') selected @endif>Jalapa</option>
                                        <option value="Jutiapa" @if ($user->departamento == 'Jutiapa') selected @endif>Jutiapa</option>
                                        <option value="Petén" @if ($user->departamento == 'Petén') selected @endif>Petén</option>
                                        <option value="Quetzaltenango" @if ($user->departamento == 'Quetzaltenango') selected @endif>Quetzaltenango</option>
                                        <option value="Quiché" @if ($user->departamento == 'Quiché') selected @endif>Quiché</option>
                                        <option value="Retalhuleu" @if ($user->departamento == 'Retalhuleu') selected @endif>Retalhuleu</option>
                                        <option value="Sacatepéquez" @if ($user->departamento == 'Sacatepéquez') selected @endif>Sacatepéquez</option>
                                        <option value="San Marcos" @if ($user->departamento == 'San Marcos') selected @endif>San Marcos</option>
                                        <option value="Santa Rosa" @if ($user->departamento == 'Santa Rosa') selected @endif>Santa Rosa</option>
                                        <option value="Sololá" @if ($user->departamento == 'Sololá') selected @endif>Sololá</option>
                                        <option value="Suchitepéquez" @if ($user->departamento == 'Suchitepéquez') selected @endif>Suchitepéquez</option>
                                        <option value="Totonicapán" @if ($user->departamento == 'Totonicapán') selected @endif>Totonicapán</option>
                                        <option value="Zacapa" @if ($user->departamento == 'Zacapa') selected @endif>Zacapa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="sexo">Sexo</label>
                                    <select name="sexo" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="Masculino" @if ($user->sexo == 'Masculino') selected @endif>Masculino</option>
                                        <option value="Femenino" @if ($user->sexo == 'Femenino') selected @endif>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="rut">ROL</label>
                                    <select name="rol" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}" @if ($rol->id == $user->rol->id) selected @endif>{{ $rol->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="newpassword">Contraseña</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Escriba una nueva contraseña (opcional)" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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