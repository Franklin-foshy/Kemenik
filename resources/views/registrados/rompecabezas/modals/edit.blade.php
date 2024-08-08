<div class="modal fade" id="editRompecabeza{{ $rompecabeza->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar rompecabeza: <b>{{ $rompecabeza->name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('rompecabeza-edit-post', $rompecabeza->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="name">Texto de rompecabeza</label>
                                <input class="form-control" type="text" name="name" placeholder="Escriba texto de la rompecabeza" required value="{{ $rompecabeza->name }}" />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="rut">Nivel</label>
                                <select name="nivel_id" class="form-select selectpicker" required>
                                    <option value="">-- SELECCIONE --</option>
                                    @foreach ($nivels as $nivel)
                                    <option value="{{ $nivel->id }}" @if ($nivel->id == $rompecabeza->nivel->id) selected @endif>{{ $nivel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="imagen">Imagen</label>
                                @if($rompecabeza->imagen)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('rompecabezas/' . $rompecabeza->imagen) }}" alt="Imagen de la rompecabeza" style="max-width: 250px;">
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