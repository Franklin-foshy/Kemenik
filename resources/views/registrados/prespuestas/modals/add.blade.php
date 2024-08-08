<div class="modal fade" id="newPRespuesta" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Registrar Nuevo PERSONAJE RESPUESTA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('prespuesta-post') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nombre">Nombre personaje</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Escriba el nombre del personaje" required />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="ppregunta">Personaje pregunta</label>
                                <select name="ppregunta_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($ppreguntas as $ppregunta)
                                    <option value="{{ $ppregunta->id }}">{{ $ppregunta->texto_pregunta }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_respuesta">Texto de prespuesta</label>
                                <input class="form-control" type="text" name="texto_respuesta" placeholder="Escriba texto de la persona respuesta" required />
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