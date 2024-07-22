<div class="modal fade" id="editRol{{ $rol->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar Rol: <b>{{ $rol->name }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('rol-edit-post', $rol->id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12 col-lg-12">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="name">Nombre del Rol</label>
                                <input class="form-control" type="text" name="name" placeholder="Escriba el nombre del rol" required value="{{ $rol->name }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 d-flex">
                        @foreach (permissionsUser() as $key => $value)
                        <div class="col-md-12 col-lg-4">
                            <div class="mb-3">
                                <div class="card mb-3 mt-4">
                                    <div class="card-body position-relative">
                                        <h5 class="text-center text-uppercase">{!! $value['title'] !!}</h5>
                                        <hr>
                                        <div class="row">
                                            @foreach ($value['keys'] as $k => $v)
                                            <div class="col-md-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="{{ $key }}" type="checkbox" name="{{ $k }}" @if (kvfj($rol->permissions, $k)) checked @endif />
                                                    <label class="form-check-label" for="{{ $k }}">{{ $v }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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