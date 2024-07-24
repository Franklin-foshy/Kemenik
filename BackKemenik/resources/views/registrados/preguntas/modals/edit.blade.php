<div class="modal fade" id="editPregunta{{ $pregunta->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar Pregunta: <b>{{ $pregunta->name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('pregunta-edit-post', $pregunta->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_pregunta">Texto de pregunta</label>
                                <input class="form-control" type="text" name="texto_pregunta" placeholder="Escriba texto de la pregunta" required value="{{ $pregunta->texto_pregunta }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="texto_respuesta">Texto de respuesta</label>
                                <input class="form-control" type="text" name="texto_respuesta" placeholder="Escriba texto de la respuesta" required value="{{ $pregunta->texto_respuesta }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="nivel_id">Nivel</label>
                                <select name="nivel_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($nivels as $nivel)
                                    <option value="{{ $nivel->id }}" @if ($nivel->id == $pregunta->nivel->id) selected @endif>{{ $nivel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="imagen">Imagen</label>
                                @if($pregunta->imagen)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('preguntas/' . $pregunta->imagen) }}" alt="Imagen de la pregunta" style="max-width: 250px;">
                                </div>
                                @endif
                                <input class="form-control" type="file" name="imagen" />
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