<div class="container-fluid">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h3>CORRESPONSABILIDAD DOMESTICA</h3>
                </div>
            </div>
        </div>
        <div id="niveles-container" class="row">
            <!-- Aquí se cargarán dinámicamente los niveles -->
        </div>
        <div id="preguntas-container" class="row mt-4">
            <!-- Aquí se cargarán dinámicamente las preguntas -->
        </div>
        <div id="respuestas-container" class="row mt-4">
            <!-- Aquí se cargarán dinámicamente las respuestas -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Cargar los niveles
        $.ajax({
            url: 'http://127.0.0.1:8000/api/niveles/',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.data && response.data.length > 0) {
                    let nivelesHtml = '';
                    response.data.forEach(function(nivel) {
                        nivelesHtml += `
                        <div class="col-lg-4 col-md-6">
                            <div class="card mb-4">
                                <img src="${nivel.imagen}" class="card-img-top" alt="${nivel.name}">
                                <div class="card-body">
                                    <h5 class="card-title">${nivel.name}</h5>
                                    <p class="card-text">${nivel.descripcion}</p>
                                    <button class="btn btn-primary ver-preguntas" data-nivel-id="${nivel.id}">Ver preguntas</button>
                                </div>
                            </div>
                        </div>
                    `;
                    });
                    $('#niveles-container').html(nivelesHtml);
                } else {
                    $('#niveles-container').html(`
                    <div class="col-12">
                        <div class="alert alert-primary text-center">
                            No hay niveles disponibles.
                        </div>
                    </div>
                `);
                }
            },
            error: function() {
                $('#niveles-container').html(`
                <div class="col-12">
                    <div class="alert alert-danger text-center">
                        Error al cargar los niveles.
                    </div>
                </div>
            `);
            }
        });

        // Manejador de evento para el botón "Ver preguntas"
        $(document).on('click', '.ver-preguntas', function() {
            let nivelId = $(this).data('nivel-id');

            $.ajax({
                url: `http://127.0.0.1:8000/api/preguntas_por_nivel/${nivelId}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        let preguntasHtml = '';
                        response.data.forEach(function(pregunta) {
                            preguntasHtml += `
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">${pregunta.texto_pregunta}</h5>
                                        <p class="card-text">${pregunta.texto_respuesta}</p>
                                        <button class="btn btn-secondary ver-respuestas" data-pregunta-id="${pregunta.id}">Ver respuestas</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        $('#preguntas-container').html(preguntasHtml);
                    } else {
                        $('#preguntas-container').html(`
                        <div class="col-12">
                            <div class="alert alert-primary text-center">
                                No hay preguntas disponibles para este nivel.
                            </div>
                        </div>
                    `);
                    }
                },
                error: function() {
                    $('#preguntas-container').html(`
                    <div class="col-12">
                        <div class="alert alert-danger text-center">
                            Error al cargar las preguntas.
                        </div>
                    </div>
                `);
                }
            });
        });

        // Manejador de evento para el botón "Ver respuestas"
        $(document).on('click', '.ver-respuestas', function() {
            let preguntaId = $(this).data('pregunta-id');

            $.ajax({
                url: `http://127.0.0.1:8000/api/respuestas_por_pregunta/${preguntaId}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        let respuestasHtml = '';
                        response.data.forEach(function(respuesta) {
                            respuestasHtml += `
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <img src="${respuesta.imagen}" class="card-img-top" alt="Respuesta ${respuesta.id}">
                                    <div class="card-body">
                                        <p class="card-text">${respuesta.texto_respuesta}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        $('#respuestas-container').html(respuestasHtml);
                    } else {
                        $('#respuestas-container').html(`
                        <div class="col-12">
                            <div class="alert alert-primary text-center">
                                No hay respuestas disponibles para esta pregunta.
                            </div>
                        </div>
                    `);
                    }
                },
                error: function() {
                    $('#respuestas-container').html(`
                    <div class="col-12">
                        <div class="alert alert-danger text-center">
                            Error al cargar las respuestas.
                        </div>
                    </div>
                `);
                }
            });
        });
    });
</script>