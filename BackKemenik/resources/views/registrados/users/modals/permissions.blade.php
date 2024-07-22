<div class="modal fade" id="permissionUser{{ $user->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content position-relative">
            <div class="modal-body p-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExampleDemoLabel">Permisos Usuario: {{ $user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{ route('user-permissions-post', $user->id) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-2 d-flex">
                            @foreach (permissionsUser() as $key => $value)
                            <div class="col-md-12 col-lg-4 align-self-stretch">
                                <div class="mb-3">
                                    <div class="card mb-3 mt-4">
                                        <div class="card-body position-relative">
                                            <h5 class="text-center text-uppercase">{!! $value['title'] !!}</h5>
                                            <hr>
                                            <div class="row text-start">
                                                @foreach ($value['keys'] as $k => $v)
                                                <div class="col-md-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" id="{{ $key }}" type="checkbox" name="{{ $k }}" @if (kvfj($user->permissions, $k)) checked @endif />
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
</div>