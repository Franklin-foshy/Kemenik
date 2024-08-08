<div class="modal fade" id="editEscena{{ $escena->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar escena: <b>{{ $escena->name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('escena-edit-post', $escena->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="descripcion">Descripción de la escena</label>
                                <input class="form-control" type="text" name="descripcion" placeholder="Escriba texto de la escena" required value="{{ $escena->descripcion }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="rut">Nivel</label>
                                <select name="nivel_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($nivels as $nivel)
                                    <option value="{{ $nivel->id }}" @if ($nivel->id == $escena->nivel->id) selected @endif>{{ $nivel->name }}</option>
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