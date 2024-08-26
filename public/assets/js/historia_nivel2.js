const modal_niveles = document.querySelector('.modal_niveles');
const contenedor_mensajes = document.getElementById('mensajes_de_respuestas')


// ------------------------- Mensajes base de datos ----------------------------------
var tamaño = 0;
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
// funcion para cargar la barra
function cargar_barra(){
    const barra = document.getElementById('barra');
    barra.value += tamaño;
}


let vidas = 3;


function cambiar_fondo(elemento, nueva_ruta) {
    elemento.style.backgroundImage = `url(${nueva_ruta})`;
};



var contador = 1;
var contendor = document.getElementById('contenedor');
var seguiente_memsaje = document.getElementById('siguiente_mensaje');
var siguiente_escena = document.getElementById('siguiente_escena');
var regresar = document.getElementById('regresar');
var close_modal = document.querySelector('.close_modal');
var modal = document.getElementById("modal");
var cerrar_modal = document.getElementById('cerrar_modal');






function verificarRespuesta(respuestaSeleccionada) {
    let respuestaCorrecta = array_opciones[contador][array_opciones[contador].length - 1].correcta ;
    //window.alert('llego a la verificacion')
    if (respuestaSeleccionada === respuestaCorrecta) {
        //window.alert('entro al if')
        // Respuesta correcta
        launchConfetti();
        contenedor_mensajes.style.display = "none";
        seguiente_memsaje.style.display = "none";
        //window.alert('llego al confetti')
        setTimeout(() => {
            siguiente_escena.style.display = "block";
            siguiente_escena.style.pointerEvents = "auto";
            siguiente_escena.onclick = () => {
                siguiente_escena.style.display = "none";
                siguiente_escena.style.pointerEvents = "none";
                contador ++;
                window.alert('llego a la funcion')
                cambiar_fondo(contendor,imagenes_fondo[contador])
                cargar_barra(); // Llama a la función que necesitas
                window.alert('paso a la funcion')
                modal_niveles.style.opacity = '1';
                modal_niveles.style.visibility = 'visible';

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




let correcto = 0;
    
    let timeoutIDs = [];
    // Funcion para mostrar cosas 
    function show(variable) {
        variable.style.display = 'block';
    };

    // Funcion para reiniciar los gifs
    function resetGif(gifElement) {
        const parent = gifElement.parentNode;
        const clone = gifElement.cloneNode(true); // Clonar el elemento GIF
        parent.removeChild(gifElement); // Eliminar el GIF original del DOM
        parent.appendChild(clone); // Volver a agregar el clon al DOM
    }

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

    // Funcion para cambiar de fondo 

    // Cambiar tamaño de cosas
    function Cambiar_tamaño (variable,tamaño){
        variable.style.width = tamaño + 'px'; 
    }
    // Función para reiniciar todos los timeouts de la primera escena
    function reiniciar_tiempos() {
        timeoutIDs.forEach(id => clearTimeout(id));
        timeoutIDs = []; 
    }

// --------------- cambiar el fondo -----------------------------


cambiar_fondo(contendor,imagenes_fondo[contador])
 // Primer escena 
function escena_1() {
    //cambiar_fondo(contendor, 'imgs/nivel2/E1/IXKIK_PERFIL_E1.png');
    show(document.getElementById('junajpu_quieto_E1'))
    show(document.getElementById('ixkin_quieta_E1'))
    show(document.getElementById('batz_caimando_E1'))
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        disguise(document.getElementById('junajpu_caminando_ixkin_E1'))
        show(document.getElementById('batz_quieto'))
        disguise(document.getElementById('batz_caimando_E1'))
        seguiente_memsaje.addEventListener('click', saludos_de_batz_a_junajpu);
    }, 8000);

    //asignar_opciones(contador);
}
function saludos_de_batz_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    show(document.getElementById('batz_hablando_E1'))
    change_message(document.getElementById('mensaje_batz_a_junajpu_E1_pregregunta'), array_opciones[0][0].pregunta)
    show(document.getElementById('mensaje_batz_a_junajpu_E1'))
    disguise(document.getElementById('batz_quieto'))
    disguise(document.getElementById('junajpu_caminando_ixkin_E1'))
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        show(document.getElementById('batz_quieto'))
        disguise(document.getElementById('batz_hablando_E1'))
        seguiente_memsaje.removeEventListener('click', saludos_de_batz_a_junajpu);
        seguiente_memsaje.addEventListener('click', saludo_de_junajpu_a_batz);
    }, 3000);

}

function saludo_de_junajpu_a_batz (){
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('menaje_junajpu_a_batz_E1_respuesta'), array_opciones[0][0].correcta)
    show(document.getElementById('junajpu_hablando'))
    show(document.getElementById('menaje_junajpu_a_batz'))
    disguise(document.getElementById('junajpu_quieto_E1'))
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        show(document.getElementById('junajpu_quieto_E1'))
        disguise(document.getElementById('junajpu_hablando'))
        seguiente_memsaje.removeEventListener('click', saludo_de_junajpu_a_batz);
        seguiente_memsaje.addEventListener('click', pregunta_de_batz_E1);
        resetGif(document.getElementById('batz_hablando_E1'))
    }, 3000);
}

function pregunta_de_batz_E1() {
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_batz_a_junajpu_E1_pregregunta'), array_opciones[0][1].pregunta)
    disguise(document.getElementById('batz_quieto'))
    disguise(document.getElementById('menaje_junajpu_a_batz'))
    show(document.getElementById('batz_hablando2_E1'))
    show(document.getElementById('mensaje_batz_a_junajpu_E1'))
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        show(document.getElementById('batz_quieto'))
        disguise(document.getElementById('batz_hablando2_E1'))
        seguiente_memsaje.removeEventListener('click', pregunta_de_batz_E1);
        seguiente_memsaje.addEventListener('click',opciones_para_respuesta_junajpu_E1);
    }, 3000);
}



function opciones_para_respuesta_junajpu_E1() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', opciones_para_respuesta_junajpu_E1);
    }, 500);
}



function escena2() {
    disguise(document.getElementById('junajpu_quieto_E1'))
    disguise(document.getElementById('ixkin_quieta_E1'))
    disguise(document.getElementById('batz_quieto'))
    disguise(document.getElementById('mensaje_batz_a_junajpu_E1'))
    show(document.getElementById('plato_de_sopa'))
    show(document.getElementById('ixchel_quieta'))
    show(document.getElementById('junajpu_sentado'))
    show(document.getElementById('ixkin_sentada'))
    setTimeout(() => {
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.addEventListener('click', pregunta_ixchel_E2);
    }, 100);
}

function pregunta_ixchel_E2(){
    change_message(document.getElementById('mensaje_ixchel_a_junajpu_E1_pregregunta'), array_opciones[contador][array_opciones[contador].length - 1].pregunta)
    show(document.getElementById('mensaje_ixchel_a_junajpu'))
}


let escenas_ = [escena_1,escena2]

document.querySelector('.close-btn').addEventListener('click', function() {
    modal_niveles.style.opacity = '0';
    modal_niveles.style.visibility = 'hidden';
    escenas_[contador]();
});

function deshabilitarOpciones() {
        document.querySelectorAll('.mensajes_de_respuestas').forEach(boton => {
            boton.disabled = true;
        });
    }



time_teminar = setTimeout(function(){
        document.getElementById('header_principal').style.display = 'block'
        document.getElementById('barra_id').style.display = 'block'
        document.getElementById('nivel').style.display = 'block'
        document.getElementById('contenedor').style.display = 'flex'
        document.getElementById('vidas').style.display = 'block'
        modal_niveles.style.opacity = '1';
        modal_niveles.style.visibility = 'visible'; 
        cargando.style.display = 'none'
        tamaño = 100/array_opciones.length;
        
}, 5000);

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

