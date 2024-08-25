// ------------------------- Mensajes base de datos ----------------------------------

let array_opciones = [];

// Cargar las escenas del API
$.ajax({
    url: `http://127.0.0.1:8000/api/escenas/`,
    type: 'GET',
    dataType: 'json',
    success: function(sceneResponse) {
        if (sceneResponse.data && sceneResponse.data.length > 0) {
            sceneResponse.data.forEach(function(escena) {
                let todo = [] ;
                // Cargar las preguntas relacionadas con la escena
                $.ajax({
                    url: `http://127.0.0.1:8000/api/ppreguntas/`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(questionResponse) {
                        if (questionResponse.ppreguntas && questionResponse.ppreguntas.length > 0) {
                            questionResponse.ppreguntas.forEach(function(pregunta) {

                                // Evaluar si el id de la escena coincide con el id de la escena en la pregunta
                                if (escena.id === pregunta.escena_id) {
                                    let respuestas = [];

                                    // Cargar las respuestas para la pregunta actual
                                    $.ajax({
                                        url: `http://127.0.0.1:8000/api/prespuestas/`,
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function(response) {
                                            if (response.data && response.data.length > 0) {
                                                response.data.forEach(function(respuesta) {
                                                    
                                                    // Evaluar si el id de la pregunta coincide con el id de la pregunta en la respuesta
                                                    if (pregunta.id === respuesta.ppregunta_id) {
                                                        respuestas.push(respuesta.texto_respuesta);
                                                    }
                                                });

                                                let preguntaDiccionario = {
                                                    pregunta: pregunta.texto_pregunta,
                                                    opciones: respuestas,
                                                    correcta: pregunta.texto_respuesta
                                                };

                                                todo.push(preguntaDiccionario);
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            console.error('Error en la solicitud de respuestas:', textStatus, errorThrown);
                                        }
                                    });
                                }
                            });
                        } else {
                            console.log('No hay preguntas disponibles para esta escena.');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error en la solicitud de preguntas:', textStatus, errorThrown);
                    }
                });
                array_opciones.push(todo);
            });
        } else {
            console.log('No hay escenas disponibles.');
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud de escenas:', textStatus, errorThrown);
    }
});



function generarHTMLPorId(idPregunta) {
    let contenedorMensajes = document.getElementById('mensajes_de_respuestas');
    let diccionario_pre = array_opciones[idPregunta];
    let preguntaDiccionario = diccionario_pre[diccionario_pre.length - 1];
    
    // Verifica si el contenedor existe y si el idPregunta es válido
    if (contenedorMensajes && preguntaDiccionario) {
        // Elimina las respuestas previas
        let elementosPrevios = contenedorMensajes.querySelectorAll('.respuesta');
        elementosPrevios.forEach(function(elemento) {
            contenedorMensajes.removeChild(elemento);
        });
        
        // Crear los divs para las respuestas
        preguntaDiccionario.opciones.forEach(function(respuesta) {
            let divRespuesta = document.createElement('div');
            divRespuesta.className = 'respuesta opciones_mensajes_botones';
            divRespuesta.textContent = respuesta;

            divRespuesta.onclick = function() {
                verificarRespuesta(respuesta);
            };

            contenedorMensajes.appendChild(divRespuesta);
        });
    } else {
        console.log('Pregunta no encontrada o contenedor no disponible.');
    }
}
let vidas = 3;

let tamaño = 100/array_opciones.length;

function cargar_barra (){
    const barra = document.getElementById('barra');
    barra.value += tamaño;
}

function verificarRespuesta(respuestaSeleccionada) {
    let respuestaCorrecta = array_opciones[0][array_opciones[0].length - 1].correcta ;
    window.alert('llego a la verificacion')
    if (respuestaSeleccionada === respuestaCorrecta) {
        window.alert('entro al if')
        // Respuesta correcta
        launchConfetti();
        window.alert('llego al confetti')
        setTimeout(() => {
            siguiente_escena.style.display = "block";
            siguiente_escena.style.pointerEvents = "auto";
            siguiente_escena.onclick = () => {
                siguiente_escena.style.display = "none";
                siguiente_escena.style.pointerEvents = "none";
                cargar_barra(); // Llama a la función que necesitas
            };
        }, 4000);
    } else {
        // Respuesta incorrecta
        vidas--;
        actualizarVidas();
        if (vidas === 0) {
            modal.classList.add('modal_show');
            // Deshabilitar opciones si es necesario
        }
    }
}

// Inicializa las vidas
    actualizarVidas();

function actualizarVidas() {
    const contenedorVidas = document.getElementById('vidas');
    contenedorVidas.innerHTML = '';
    for (let i = 0; i < vidas; i++) {
        const vida = document.createElement('span');
        vida.classList.add('vida');
        vida.textContent = '❤️';
        contenedorVidas.appendChild(vida);
    }
}

function launchConfetti() {
    const duration = 4 * 1000; // Duración en milisegundos
    const animationEnd = Date.now() + duration;
    const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

    function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
    }

    const interval = setInterval(function() {
        const timeLeft = animationEnd - Date.now();
        if (timeLeft <= 0) {
            return clearInterval(interval);
        }
        const particleCount = 250 * (timeLeft / duration);
        // Lanzar confeti desde diferentes lugares
        confetti(Object.assign({}, defaults, { 
            particleCount, 
            origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 }
        }));
        confetti(Object.assign({}, defaults, { 
            particleCount, 
            origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 }
        }));
    }, 300);
}

document.addEventListener("DOMContentLoaded", function() {
    // Obtener elementos del DOM
    const contendor = document.getElementById('contenedor');
    const seguiente_memsaje = document.getElementById('siguiente_mensaje');
    const siguiente_escena = document.getElementById('siguiente_escena');
    const regresar = document.getElementById('regresar');
    const close_modal = document.querySelector('.close_modal');
    let modal = document.getElementById("modal");
    const cerrar_modal = document.getElementById('cerrar_modal');




let correcto = 0;
    var contador = 0;
    
    let timeoutIDs = [];
    // Funcion para mostrar cosas 
    function show(variable) {
        variable.style.display = 'block';
    };


    function salir() {
        regresar.style.display = "block"
    };

    // Funcion para ocultar cosas 
    function disguise(variable) {
        variable.style.display = 'none';
    };

    // Funcion para cambia contenido de un parrafo
    function change_message(variable, text_new) {
        variable.textContent = text_new;
    };


    // funcion para ca,biar de ubicacion con %
    function cambiar_ubicacion_porcentaje(variable,left,top){
        variable.style.position = 'absolute';
        variable.style.left = left + '%';
        variable.style.top = top + '%';
    }
    // cambiar ubicacion e tipo relativo
    function cambiar_ubicacion_porcentaje_rela(variable,left,top){
        variable.style.position = 'relative';
        variable.style.left = left + '%';
        variable.style.top = top + '%';
    }
    // Funcion para cambiar de fondo 
    function cambiar_fondo(elemento, nueva_ruta) {
        elemento.style.backgroundImage = `url(${nueva_ruta})`;
    };

    // Cambiar tamaño de cosas
    function Cambiar_tamaño (variable,tamaño){
        variable.style.width = tamaño + 'px'; 
    }
    // Función para reiniciar todos los timeouts de la primera escena
    function reiniciar_tiempos() {
        timeoutIDs.forEach(id => clearTimeout(id));
        timeoutIDs = []; 
    }

 // Primer escena 
function escena_1() {
    contador = 0;
    cambiar_fondo(contendor, 'imgs/nivel2/E1/BACKGROUND-E1.png');
    show(document.getElementById('junajpu_caminando_ixkin_E1'))
    show(document.getElementById('batz_caimando_E1'))
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        disguise(document.getElementById('junajpu_caminando_ixkin_E1'))
        show(document.getElementById('junajpu_quieto_E1'))
        show(document.getElementById('ixkin_quieta_E1'))
        show(document.getElementById('batz_quieto'))
        disguise(document.getElementById('batz_caimando_E1'))
        seguiente_memsaje.addEventListener('click', pregunta_de_batz_E1);
    }, 8000);

    //asignar_opciones(contador);
}

function pregunta_de_batz_E1() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(document.getElementById('mensaje_batz_a_junajpu_E1_pregregunta'), array_opciones[0][0].pregunta)
        disguise(document.getElementById('batz_quieto'))
        show(document.getElementById('batz_hablando_E1'))
        show(document.getElementById('mensaje_batz_a_junajpu_E1'))
        seguiente_memsaje.addEventListener('click',opciones_para_respuesta_junajpu_E1);
    }, 500);
}


function opciones_para_respuesta_junajpu_E1() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        generarHTMLPorId(contador)
        seguiente_memsaje.addEventListener('click',);
    }, 500);
}
   escena_1();


function deshabilitarOpciones() {
        document.querySelectorAll('.respuesta opciones_mensajes_botones').forEach(boton => {
            boton.disabled = true;
        });
    }




});


cerrar_modal.addEventListener('click', (e)=> {
    e.preventDefault()
    modal.classList.remove('modal_show')
    setTimeout(() => {
        location.reload();
    }, 500);
} );

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        e.stopPropagation(); // Evita que el clic en el fondo cierre el modal
    }
});

// Evita que el modal se cierre al hacer clic en el contenido
modalContent.addEventListener('click', (e) => {
    e.stopPropagation(); // Evita que el clic en el contenido cierre el modal
});





function goHome() {
    window.location.href = '/home';
}