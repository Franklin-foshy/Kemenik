<div class="modal fade" id="newPPregunta" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Registrar Nuevo PERSONAJE PREGUNTA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ppregunta-post') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_pregunta">Texto del personaje pregunta</label>
                                <input class="form-control" type="text" name="texto_pregunta" placeholder="Escriba texto del personaje pregunta" required />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_respuesta">Texto de personaje respuesta</label>
                                <input class="form-control" type="text" name="texto_respuesta" placeholder="Escriba texto del personaje respuesta" required />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nombre">Nombre personaje</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Escriba el nombre del personaje" required />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nivel">Nivel</label>
                                <select name="nivel_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($nivels as $nivel)
                                    <option value="{{ $nivel->id }}">{{ $nivel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="escena">Escena</label>
                                <select name="escena_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($escenas as $escena)
                                    <option value="{{ $escena->id }}">{{ $escena->descripcion }}</option>
                                    @endforeach
                                </select>
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