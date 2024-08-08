<div class="modal fade" id="verRespuestas{{ $pregunta->id }}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pregunta: <b>{{ $pregunta->texto_pregunta }}</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @forelse($pregunta->respuestas as $respuesta)
                    <div class="col-md-4 mb-3">
                        <h4>{{ $respuesta->texto_respuesta }}</h4>
                        @if($respuesta->imagen)
                        <img class="img-thumbnail img-reducida" src="{{ asset('respuestas/' . $respuesta->imagen) }}" alt="Respuesta Image">
                        @endif
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-primary text-center">
                            No hay respuestas disponibles para esta pregunta.
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>