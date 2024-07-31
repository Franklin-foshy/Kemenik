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
                                    <label for="pais" class="form-label">País</label>
                                    <select id="paisEdit" name="pais_id" class="form-control" required>
                                        <option value="">Selecciona tu país</option>
                                        @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona tu país
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="departamento-container-edit" style="display:none;">
                                    <label for="departamento" class="form-label">Departamento</label>
                                    <select id="departamentoEdit" name="departamento_id" class="form-control">
                                        <!-- Opciones de departamentos cargadas dinámicamente -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3" id="municipio-container-edit" style="display:none;">
                                    <label for="municipio" class="form-label">Municipio</label>
                                    <select id="municipioEdit" name="municipio_id" class="form-control">
                                        <!-- Opciones de municipios cargadas dinámicamente -->
                                    </select>
                                </div>
                            </div>

                            <script>
                                document.getElementById('paisEdit').addEventListener('change', function() {
                                    const paisId = this.value;

                                    if (paisId == 185) { // ID de Guatemala
                                        document.getElementById('departamento-container-edit').style.display = 'block';
                                        // Cargar los departamentos vía AJAX
                                        fetch(`/getDepartamentos/${paisId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                let departamentoSelect = document.getElementById('departamentoEdit');
                                                departamentoSelect.innerHTML = '';
                                                data.forEach(departamento => {
                                                    let option = document.createElement('option');
                                                    option.value = departamento.id;
                                                    option.text = departamento.name;
                                                    departamentoSelect.appendChild(option);
                                                });
                                            });
                                    } else {
                                        document.getElementById('departamento-container-edit').style.display = 'none';
                                        document.getElementById('municipio-container-edit').style.display = 'none';
                                    }
                                });

                                document.getElementById('departamentoEdit').addEventListener('change', function() {
                                    const departamentoId = this.value;

                                    if (departamentoId) {
                                        document.getElementById('municipio-container-edit').style.display = 'block';
                                        // Cargar los municipios vía AJAX
                                        fetch(`/getMunicipios/${departamentoId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                let municipioSelect = document.getElementById('municipioEdit');
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