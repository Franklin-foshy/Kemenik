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
                                    <label for="pais" class="form-label">País</label>
                                    <select id="pais" name="pais_id" class="form-control" required>
                                        <option value="">Selecciona tu país</option>
                                        @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona tu país
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="departamento-container" style="display:none;">
                                    <label for="departamento" class="form-label">Departamento</label>
                                    <select id="departamento" name="departamento_id" class="form-control">
                                        @if(old('pais_id') == 185)
                                        @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                            {{ $departamento->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="municipio-container" style="display:none;">
                                    <label for="municipio" class="form-label">Municipio</label>
                                    <select id="municipio" name="municipio_id" class="form-control">
                                        @if(old('departamento_id'))
                                        @foreach($municipios as $municipio)
                                        <option value="{{ $municipio->id }}" {{ old('municipio_id') == $municipio->id ? 'selected' : '' }}>
                                            {{ $municipio->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const paisId = document.getElementById('pais').value;
                                    const departamentoId = document.getElementById('departamento').value;

                                    if (paisId == 185) {
                                        document.getElementById('departamento-container').style.display = 'block';
                                        // Cargar los departamentos vía AJAX si es necesario
                                    }

                                    if (departamentoId) {
                                        document.getElementById('municipio-container').style.display = 'block';
                                        // Cargar los municipios vía AJAX si es necesario
                                    }
                                });

                                document.getElementById('pais').addEventListener('change', function() {
                                    const paisId = this.value;

                                    if (paisId == 185) { // ID de Guatemala
                                        document.getElementById('departamento-container').style.display = 'block';
                                        // Cargar los departamentos vía AJAX
                                        fetch(`/getDepartamentos/${paisId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                let departamentoSelect = document.getElementById('departamento');
                                                departamentoSelect.innerHTML = '';
                                                data.forEach(departamento => {
                                                    let option = document.createElement('option');
                                                    option.value = departamento.id;
                                                    option.text = departamento.name;
                                                    departamentoSelect.appendChild(option);
                                                });
                                            });
                                    } else {
                                        document.getElementById('departamento-container').style.display = 'none';
                                        document.getElementById('municipio-container').style.display = 'none';
                                    }
                                });

                                document.getElementById('departamento').addEventListener('change', function() {
                                    const departamentoId = this.value;

                                    if (departamentoId) {
                                        document.getElementById('municipio-container').style.display = 'block';
                                        // Cargar los municipios vía AJAX
                                        fetch(`/getMunicipios/${departamentoId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                let municipioSelect = document.getElementById('municipio');
                                                municipioSelect.innerHTML = '';
                                                data.forEach(municipio => {
                                                    let option = document.createElement('option');
                                                    option.value = municipio.id;
                                                    option.text = municipio.name;
                                                    municipioSelect.appendChild(option);
                                                });
                                            });
                                    }
                                });
                            </script>

                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select id="sexo" class="form-select" name="sexo" required>
                                        <option value="">Selecciona tu sexo</option>
                                        <option value="Hombre" {{ old('sexo') == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                                        <option value="Mujer" {{ old('sexo') == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="comunidad" class="form-label">Comunidad</label>
                                    <input id="comunidad" type="text" class="form-control" name="comunidad" value="{{ old('comunidad') }}">
                                    <div class="invalid-feedback">
                                        Por favor ingresa nombres y apellidos completos
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="etnia" class="form-label">Grupo etnico</label>
                                    <select id="etnia" class="form-select" name="etnia" required>
                                        <option value="">Selecciona tu etnia</option>
                                        <option value="Maya" {{ old('etnia') == 'Maya' ? 'selected' : '' }}>Maya</option>
                                        <option value="Xinka" {{ old('etnia') == 'Xinka' ? 'selected' : '' }}>Xinka</option>
                                        <option value="Garifuna" {{ old('etnia') == 'Garifuna' ? 'selected' : '' }}>Garifuna</option>
                                        <option value="Ladino" {{ old('etnia') == 'Ladino' ? 'selected' : '' }}>Ladino</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona tu grupo etnico
                                    </div>
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