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

                            <!-- Select País -->
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label for="pais{{ $user->id }}" class="form-label">País: <strong>{{ $user->pais->name ?? 'Vacío' }}</strong></label>
                                    <select id="pais{{ $user->id }}" name="pais_id" class="form-control" required>
                                        <option value="">Selecciona tu país</option>
                                        @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}"
                                            {{ $user->pais_id == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Select Departamento -->
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="departamento-container{{ $user->id }}">
                                    <label for="departamento{{ $user->id }}" class="form-label">Departamento: <strong>{{ $user->departamento->name ?? 'Vacío' }}</strong></label>
                                    <select id="departamento{{ $user->id }}" name="departamento_id" class="form-control">
                                        @if($user->pais_id == 185) <!-- Si el país es Guatemala -->
                                        @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}"
                                            {{ $user->departamento_id == $departamento->id ? 'selected' : '' }}>
                                            {{ $departamento->name }}
                                        </option>
                                        @endforeach
                                        @else
                                        <option value="">Vacío</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <!-- Select Municipio -->
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="municipio-container{{ $user->id }}">
                                    <label for="municipio{{ $user->id }}" class="form-label">Municipio: <strong>{{ $user->municipio->name ?? 'Vacío' }}</strong></label>
                                    <select id="municipio{{ $user->id }}" name="municipio_id" class="form-control">
                                        @if($user->departamento_id) <!-- Si hay departamento -->
                                        @foreach($municipios as $municipio)
                                        <option value="{{ $municipio->id }}"
                                            {{ $user->municipio_id == $municipio->id ? 'selected' : '' }}>
                                            {{ $municipio->name }}
                                        </option>
                                        @endforeach
                                        @else
                                        <option value="">Vacío</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const paisSelect = document.getElementById('pais{{ $user->id }}');
                                    const departamentoSelect = document.getElementById('departamento{{ $user->id }}');
                                    const municipioSelect = document.getElementById('municipio{{ $user->id }}');

                                    if (paisSelect.value == 185) {
                                        document.getElementById('departamento-container{{ $user->id }}').style.display = 'block';
                                    }

                                    paisSelect.addEventListener('change', function() {
                                        const paisId = this.value;
                                        if (paisId == 185) {
                                            document.getElementById('departamento-container{{ $user->id }}').style.display = 'block';
                                            fetch(`/getDepartamentos/${paisId}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    departamentoSelect.innerHTML = '<option value="">Selecciona un departamento</option>';
                                                    data.forEach(departamento => {
                                                        let option = document.createElement('option');
                                                        option.value = departamento.id;
                                                        option.text = departamento.name;
                                                        departamentoSelect.appendChild(option);
                                                    });
                                                });
                                        } else {
                                            departamentoSelect.innerHTML = '<option value="">Vacío</option>';
                                            municipioSelect.innerHTML = '<option value="">Vacío</option>';
                                            document.getElementById('departamento-container{{ $user->id }}').style.display = 'none';
                                            document.getElementById('municipio-container{{ $user->id }}').style.display = 'none';
                                        }
                                    });

                                    departamentoSelect.addEventListener('change', function() {
                                        const departamentoId = this.value;
                                        if (departamentoId) {
                                            document.getElementById('municipio-container{{ $user->id }}').style.display = 'block';
                                            fetch(`/getMunicipios/${departamentoId}`)
                                                .then(response => response.json())
                                                .then(data => {
                                                    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
                                                    data.forEach(municipio => {
                                                        let option = document.createElement('option');
                                                        option.value = municipio.id;
                                                        option.text = municipio.name;
                                                        municipioSelect.appendChild(option);
                                                    });
                                                });
                                        } else {
                                            municipioSelect.innerHTML = '<option value="">Vacío</option>';
                                        }
                                    });
                                });
                            </script>

                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="sexo">Sexo</label>
                                    <select name="sexo" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="Hombre" @if ($user->sexo == 'Hombre') selected @endif>Hombre</option>
                                        <option value="Mujer" @if ($user->sexo == 'Mujer') selected @endif>Mujer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="comunidad">Comunidad</label>
                                    <input class="form-control" type="text" name="comunidad" placeholder="Escriba la comunidad" value="{{ $user->comunidad }}" />
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="etnia">Grupo etnico</label>
                                    <select name="etnia" class="form-select selectpicker" required>
                                        <option value="">-- SELECCIONE --</option>
                                        <option value="Maya" @if ($user->etnia == 'Maya') selected @endif>Maya</option>
                                        <option value="Xinka" @if ($user->etnia == 'Xinka') selected @endif>Xinka</option>
                                        <option value="Garifuna" @if ($user->etnia == 'Garifuna') selected @endif>Garifuna</option>
                                        <option value="Ladino" @if ($user->etnia == 'Ladino') selected @endif>Ladino</option>
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