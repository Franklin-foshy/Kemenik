<div class="modal fade" id="editPPregunta{{ $ppregunta->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar ppregunta: <b>{{ $ppregunta->name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('ppregunta-edit-post', $ppregunta->id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_pregunta">Texto de ppregunta</label>
                                <input class="form-control" type="text" name="texto_pregunta" placeholder="Escriba texto de la persona pregunta" required value="{{ $ppregunta->texto_pregunta }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_respuesta">Texto de respuesta</label>
                                <input class="form-control" type="text" name="texto_respuesta" placeholder="Escriba texto de la persona respuesta" required value="{{ $ppregunta->texto_respuesta }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nombre">Nombre personaje</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Escriba el nombre del personaje" required value="{{ $ppregunta->nombre }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nivel_id">Nivel</label>
                                <select name="nivel_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($nivels as $nivel)
                                    <option value="{{ $nivel->id }}" @if ($nivel->id == $ppregunta->nivel->id) selected @endif>{{ $nivel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="escena_id">Escena</label>
                                <select name="escena_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($escenas as $escena)
                                    <option value="{{ $escena->id }}" @if ($escena->id == $ppregunta->escena->id) selected @endif>{{ $escena->descripcion }}</option>
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