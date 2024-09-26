
console.log(listaImagenes2)
function mostrarDesplegable() {
    document.getElementById('desplegableInstrucciones').style.display = 'flex'
    
    document.body.classList.add('modal-visible');  // Añade clase al body para evitar scroll
    document.getElementById('desplegableInstrucciones').classList.add('desplegable-visible'); // Muestra el modal
}

function cerrarDesplegable() {
    document.getElementById('desplegableInstrucciones').style.display = 'none'
    ambiente.play()
    document.body.classList.remove('modal-visible');  // Remueve clase del body
    document.getElementById('desplegableInstrucciones').classList.remove('desplegable-visible'); // Oculta el modal
    modal_niveles.style.opacity = '1';
    modal_niveles.style.visibility = 'visible'; 
}
''
const botonSiguienteInstruccion = document.getElementById('botonSiguienteInstruccion');
const botonVamos = document.getElementById('botonVamos');
const imagenes = document.getElementById('imagenInstruccion');
const textoInstruccion = document.getElementById('textoInstruccion');

const texto1 = 'En este nivel, tendrás que leer los diálogos de los personajes para entender el contexto de la historia y saber cómo responder más adelante.';
const texto2 = 'Cuando llegues al final de la escena, aparecerán las posibles respuestas de acuerdo a la situación que se esté experimentando. Sé paciente al responder.';
const texto3 = 'Si eliges una respuesta incorrecta, perderás una vida y causarás una mala reacción en la situación en la que te encuentres. Si pierdes todas tus vidas, regresarás a la escena 1';
const texto4 = 'Si respondes correctamente, harás que el mundo cambie y podrás avanzar a la siguiente escena hasta completar el nivel. Luego, podrás pasar al siguiente nivel.';

const listaDescripcion = [texto1, texto2, texto3,texto4];

let contadorSiguienteImagen = 0;

function cambiarImagen() {
    if (contadorSiguienteImagen >= listaImagenes2.length ) {
        botonSiguienteInstruccion.style.display = 'none';
        botonVamos.style.display = 'block';
    } else {
        imagenes.src = listaImagenes2[contadorSiguienteImagen];
        textoInstruccion.textContent = listaDescripcion[contadorSiguienteImagen];
        contadorSiguienteImagen++;
    }
}

cambiarImagen();







//  ---------------------- lista colores ------------------

var paleta_colores = ['#f8ef8d', '#a1daf6', '#f8a1b1', '#acf8b5', '#fac899'];



//  ---------------------- lista colores ------------------


// ---------------------- recuperar el id -------------------
const userId = localStorage.getItem('userId');

// ---------------------- recuperar el id -------------------


// ------------------- intentos --------------------

let intentos_2 = localStorage.getItem('intentos_2');
if (intentos_2 === null) {
    intentos_2 = 0;
} else {
    intentos_2 = parseInt(intentos_2, 10); // Asegúrate de convertirlo a número
}


intentos_2 += 1;

localStorage.setItem('intentos_2', intentos_2);

console.log(intentos_2)
// ------------------- intentos --------------------


// ------------------------ completar nivel --------------------
let contador_nivel_2 = 0 ;


let nivel_completado_2 = localStorage.getItem('nivel_completado_2');
if (nivel_completado_2 === null) {
    nivel_completado_2 = 0;
} else {
    nivel_completado_2 = parseInt(nivel_completado_2, 10); // Asegúrate de convertirlo a número
}



console.log(nivel_completado_2)

// ------------------------ completar nivel --------------------



// ----------------------- envio de informacion -----------------------------
function sendDataToApi(usuario_id, pregunta_id, completado, intentos, puntuacion, estado_proceso, texto_respuesta_preguntas, texto_respuesta_respuestas, status) {
    // Crear el objeto de datos a enviar
    const data = {
        usuario_id: usuario_id,
        personaje_pregunta_id: pregunta_id,
        completado: completado,
        intentos: intentos,
        puntuacion: puntuacion,
        estado_proceso: estado_proceso,
        texto_respuesta_preguntas: texto_respuesta_preguntas,
        texto_respuesta_respuestas: texto_respuesta_respuestas,
        status: status
    };

    // Opciones para la solicitud fetch
    const options = {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json'
        },
      body: JSON.stringify(data) // Convertir el objeto a una cadena JSON
    };

    // Realizar la solicitud
    fetch('https://junamnoj.foxint.tech/api/progreso-dos-usuario', options)
        .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Procesar la respuesta como JSON
        })
        .then(data => {
        console.log('Success:', data); // Manejar los datos de la respuesta
        })
        .catch(error => {
        console.error('Error:', error); // Manejar errores
        });
    }
// ----------------------- envio de informacion -----------------------------


const modal_niveles = document.querySelector('.modal_niveles');
let modal_text = document.getElementById('modal-text');
let modal_title = document.getElementById('modal-title');
const contenedor_mensajes = document.getElementById('mensajes_de_respuestas')
const ambiente = document.getElementById('nivel2')


// ---------------------------------- Audio ------------------------------------


//var musica = document.getElementById('musica_fondo');
var audio_correcto = document.getElementById('audio_correcto');
var audio_incorrecto = document.getElementById('audio_incorrecto');
var aplausos = document.getElementById('aplausos');


// ---------------------------------- Audio ------------------------------------


// ------------------------- Mensajes base de datos ----------------------------------
var tamaño = 0;
let array_opciones = [];

// Cargar las escenas del API
$.ajax({
    url: `http://127.0.0.1:8000/api/escenas/`,
    //url: `https://junamnoj.foxint.tech/api/escenas/`,
    type: 'GET',
    dataType: 'json',
    success: function(sceneResponse) {
        if (sceneResponse.data && sceneResponse.data.length > 0) {
            sceneResponse.data.forEach(function(escena) {
                let todo = [] ;
                // Cargar las preguntas relacionadas con la escena
                $.ajax({
                    url: `http://127.0.0.1:8000/api/ppreguntas/`,
                    //url: `https://junamnoj.foxint.tech/api/ppreguntas/`,
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
                                        //url: `https://junamnoj.foxint.tech/api/prespuestas/`,
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
                                                    escena_actual: escena.descripcion,
                                                    id: pregunta.id,
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
        
        // Mezclar la paleta de colores
        let coloresMezclados = paleta_colores.sort(() => Math.random() - 0.5);

        // Crear los divs para las respuestas
        preguntaDiccionario.opciones.forEach(function(respuesta, index) {
            let divRespuesta = document.createElement('div');
            divRespuesta.className = 'respuesta opciones_mensajes_botones';
            divRespuesta.textContent = respuesta;

            // Asigna un color aleatorio sin repetición
            divRespuesta.style.backgroundColor = coloresMezclados[index];

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



var contador = 0;
var contendor = document.getElementById('contenedor');
var seguiente_memsaje = document.getElementById('siguiente_mensaje');
var siguiente_escena = document.getElementById('siguiente_escena');
var regresar = document.getElementById('regresar');
var close_modal = document.querySelector('.close_modal');
var modal = document.getElementById("modal");
var cerrar_modal = document.getElementById('cerrar_modal');







function verificarRespuesta(respuestaSeleccionada) {
    let respuestaCorrecta = array_opciones[contador][array_opciones[contador].length - 1].correcta ;
    let id_pre = array_opciones[contador][array_opciones[contador].length - 1].id ;
    console.log(id_pre)
    //window.alert('llego a la verificacion')
    contador_nivel_2 ++;
    if (contador_nivel_2 === array_opciones.length){
        nivel_completado_2 = 1;

        localStorage.setItem('nivel_completado_2', nivel_completado_2);
    }
    if (intentos_2 <= 3){
    sendDataToApi(
        userId,              // usuario_id
        id_pre,              // pregunta_id
        nivel_completado_2,              // completado
        intentos_2,              // intentos
        12,            // puntuacion
        nivel_completado_2,              // estado_proceso
        respuestaCorrecta,      // texto_respuesta_preguntas
        respuestaSeleccionada,      // texto_respuesta_respuestas
        1               // status
        );
        }
    if (respuestaSeleccionada === respuestaCorrecta) {
        cargar_barra();
        // Selecciona todos los elementos con la clase 'gif_animado_escena'
        var elementos = document.querySelectorAll('.bubble-container');
        var elementos2 = document.querySelectorAll('.bubble-container2');

        // Recorre todos los elementos seleccionados y aplica 'display: none'
        elementos.forEach(function(elemento) {
            elemento.style.display = 'none';
        });
        elementos2.forEach(function(elementos2) {
            elementos2.style.display = 'none';
        });
        audio_correcto.play();
        setTimeout(() => {
            audio_correcto.pause();
            audio_correcto.currentTime = 0 ;
            },2000);
        //window.alert('entro al if')
        // Respuesta correcta
        if (contador === 1){
            acierto_E2()
        }else if (contador === 2) {
            respuesta_correcta_E3()
        }else if (contador ===  3){
            respuesta_correcta_E4()
        }else if (contador === 4) {
            respuesta_correcta_E5()
        }else if (contador === 5){
            respuesta_correcta_E6()
        }else if (contador === 6){
            respuesta_correcta_E7()
        }else if (contador === 7){
            respuesta_correcta_E8()
        }
        launchConfetti();
        contenedor_mensajes.style.display = "none";
        seguiente_memsaje.style.display = "none";
        //window.alert('llego al confetti')
        setTimeout(() => {
            if (contador + 1 > escenas_.length - 1 ){
                regresar.style.display = "block";
                regresar.style.pointerEvents = "auto";
                siguiente_escena.style.display = "none";
                siguiente_escena.style.pointerEvents = "none";
            }else {
            if (contador === 3) {
                setTimeout(() => {
                    siguiente_escena.style.display = "block";
                    siguiente_escena.style.pointerEvents = "auto";
                    },7000);
            }else {
            siguiente_escena.style.display = "block";
            siguiente_escena.style.pointerEvents = "auto";
            }
            siguiente_escena.onclick = () => {

                siguiente_escena.style.display = "none";
                siguiente_escena.style.pointerEvents = "none";
                contador ++;
                //window.alert('llego a la funcion')
                cambiar_fondo(contendor,imagenes_fondo[contador])
                // Llama a la función que necesitas
                //window.alert('paso a la funcion')
                modal_text.style.display = 'none'
                modal_title.textContent = array_opciones[contador][0].escena_actual
                modal_niveles.style.opacity = '1';
                modal_niveles.style.visibility = 'visible';
            }
            };
        }, 4000);
    } else {
        audio_incorrecto.play();
        setTimeout(() => {
            audio_incorrecto.pause();
            audio_incorrecto.currentTime = 0 ;
            },2000);
        // Respuesta incorrecta
        if (contador === 1){
            equivocacion_E2()
        }else if (contador === 3 ) {
            repuesta_erronear_E4()
        }else if (contador === 5){
            respuesta_incorrecta_E6()
        }

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

    // Function top 
    function toped(contendor, value) {
        contendor.style.top = value + '%';
    }

    // Function left 
    function lefted(contendor, value) {
        contendor.style.left = value + '%';
    }
    // Function direccion 
    function direccion(contendor, value) {
        contendor.style.flexDirection = value;
    }
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

// ------------ sonido al avanzar ----------------------------

// --------------- cambiar el fondo -----------------------------


cambiar_fondo(contendor,imagenes_fondo[contador])


// ------------------- Escena 1 ---------------------------------

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
    change_message(document.getElementById('mensaje_batz_a_junajpu_E1_pregregunta'), array_opciones[contador][0].pregunta)
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
    disguise(document.getElementById('mensaje_batz_a_junajpu_E1'))
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('menaje_junajpu_a_batz_E1_respuesta'), array_opciones[contador][0].correcta)
    show(document.getElementById('junajpu_hablando'))
    show(document.getElementById('menaje_junajpu_a_batz'))
    disguise(document.getElementById('junajpu_quieto_E1'))
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        show(document.getElementById('junajpu_quieto_E1'))
        disguise(document.getElementById('junajpu_hablando'))
        seguiente_memsaje.removeEventListener('click', saludo_de_junajpu_a_batz);
        seguiente_memsaje.addEventListener('click', pregunta_de_batz_E1);
    }, 3000);
}

function pregunta_de_batz_E1() {
    disguise(document.getElementById('menaje_junajpu_a_batz'))
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_batz_a_junajpu_E1_pregregunta'), array_opciones[0][1].pregunta)
    show(document.getElementById('mensaje_batz_a_junajpu_E1'))
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
    disguise(document.getElementById('mensaje_batz_a_junajpu_E1'))
    seguiente_memsaje.style.display = "none";
    show(document.getElementById('burbujas_escena1'))
    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', opciones_para_respuesta_junajpu_E1);
    }, 500);
}
// ------------------- Escena 1 ---------------------------------



// ------------------- Escena 2 ---------------------------------


function escena2() {
    disguise(document.getElementById('junajpu_quieto_E1'))
    disguise(document.getElementById('ixkin_quieta_E1'))
    disguise(document.getElementById('batz_quieto'))
    disguise(document.getElementById('mensaje_batz_a_junajpu_E1'))
    show(document.getElementById('ixchel_cocinando_E2'))
    show(document.getElementById('junajpu_sentado'))
    show(document.getElementById('ixkin_sentada'))
    setTimeout(() => {
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.addEventListener('click', Junajpu_preguinta_a_inchel);
    }, 100);
}

function Junajpu_preguinta_a_inchel(){
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_junajpu_a_ixchel_E2_pregregunta'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_junajpu_a_ixchel'))
    disguise(document.getElementById('junajpu_sentado'))
    show(document.getElementById('junajpu_hablando_E2'))
    setTimeout(() => {
        show(document.getElementById('junajpu_sentado'))
        disguise(document.getElementById('junajpu_hablando_E2'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', Junajpu_preguinta_a_inchel);
        seguiente_memsaje.addEventListener('click', respuesta_ixchel_a_junajpu);
    }, 3000);
}

function respuesta_ixchel_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_junajpu_a_ixchel'))
    change_message(document.getElementById('mensaje_ixchel_a_junajpu_E1_pregregunta'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_ixchel_a_junajpu'))
    disguise(document.getElementById('ixchel_cocinando_E2'))
    show(document.getElementById('ixchel_hablando_E2'))
    setTimeout(() => {
        show(document.getElementById('ixchel_quieta'))
        disguise(document.getElementById('ixchel_hablando_E2'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', respuesta_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click', preguta_ixchel_a_junajpu);
    }, 3000);
}

function preguta_ixchel_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_junajpu_a_ixchel'))
    change_message(document.getElementById('mensaje_ixchel_a_junajpu_E1_pregregunta'), array_opciones[contador][1].pregunta)
    show(document.getElementById('mensaje_ixchel_a_junajpu'))
    disguise(document.getElementById('ixchel_quieta'))
    show(document.getElementById('ixchel_hablando2_E2'))
    setTimeout(() => {
        show(document.getElementById('ixchel_quieta'))
        disguise(document.getElementById('ixchel_hablando2_E2'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', preguta_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click', opciones_para_respuesta_junajpu_E2 );
    }, 3000);
}

function opciones_para_respuesta_junajpu_E2() {
    seguiente_memsaje.style.display = "none";
    disguise(document.getElementById('mensaje_ixchel_a_junajpu'))
    show(document.getElementById('burbujas_escena2'))
    setTimeout(() => {
        //toped(contenedor_mensajes,'80')
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', opciones_para_respuesta_junajpu_E2);
    }, 500);
}

function equivocacion_E2 () {
    disguise(document.getElementById('ixchel_quieta'))
    disguise(document.getElementById('junajpu_sentado'))
    disguise(document.getElementById('ixkin_sentada'))
    show(document.getElementById('junjpu_enojado'))
    show(document.getElementById('ixchel_triste'))
    show(document.getElementById('ixkin_llorando'))
}

function acierto_E2 () {
    show(document.getElementById('plato_de_sopa'))
    show(document.getElementById('ixchel_quieta'))
    show(document.getElementById('junajpu_sentado'))
    show(document.getElementById('ixkin_sentada'))
    disguise(document.getElementById('junjpu_enojado'))
    disguise(document.getElementById('ixchel_triste'))
    disguise(document.getElementById('ixkin_llorando'))
}

// ------------------- Escena 2 ---------------------------------

// ------------------- Escena 3 ---------------------------------

function escena3() {
    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('ixchel_quieta'))
    disguise(document.getElementById('plato_de_sopa'))
    disguise(document.getElementById('junajpu_sentado'))
    disguise(document.getElementById('ixkin_sentada'))
    disguise(document.getElementById('mensaje_ixchel_a_junajpu'))
    show(document.getElementById('junajpu_sonriendo_quieto'))
    show(document.getElementById('junam_sentado'))
    show(document.getElementById('ixkin_sentada_E3'))
    seguiente_memsaje.addEventListener('click', llamada_de_ixchel_a_junajpu);

}

function llamada_de_ixchel_a_junajpu (){
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('junajpu_sonriendo_quieto'))
    show(document.getElementById('junajpu_hablando_telefono'))
    change_message(document.getElementById('mensaje_junajpu_a_ixchel_llamada_telefono_saludo'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_junajpu_a_ixchel_llamada_telefono'))
    setTimeout(() => {
        show(document.getElementById('junajpu_hablando_telefono_quieto'))
        disguise(document.getElementById('junajpu_hablando_telefono'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', llamada_de_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click', respuesta_de_ixchel_a_junajpu);
    }, 3000);
}

function respuesta_de_ixchel_a_junajpu (){
    seguiente_memsaje.style.pointerEvents = "none";
    show(document.getElementById('ixchel_hablando_quieta'))
    setTimeout(() => {
        disguise(document.getElementById('mensaje_junajpu_a_ixchel_llamada_telefono'))
        change_message(document.getElementById('mensaje_repuesta_ixchel_a_junajpu_telefono_respuesta_E3'), array_opciones[contador][0].correcta)
        show(document.getElementById('mensaje_repuesta_ixchel_a_junajpu_telefono'))
        show(document.getElementById('ixchel_hablando_telefono'))
        disguise(document.getElementById('ixchel_hablando_quieta'))
        setTimeout(() => {
            show(document.getElementById('ixchel_hablando_quieta'))
            disguise(document.getElementById('ixchel_hablando_telefono'))
            seguiente_memsaje.style.display = "flex";
            seguiente_memsaje.style.pointerEvents = "auto";
            seguiente_memsaje.removeEventListener('click', respuesta_de_ixchel_a_junajpu);
            seguiente_memsaje.addEventListener('click',  pregunta_de_ixchel_a_junajpu);
        }, 3000);
    }, 1000);
}

function pregunta_de_ixchel_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('ixchel_hablando_quieta'))
    show(document.getElementById('ixchel_hablando2_telefono')) 
    change_message(document.getElementById('mensaje_repuesta_ixchel_a_junajpu_telefono_respuesta_E3'), array_opciones[contador][1].pregunta)
    setTimeout(() => {
        show(document.getElementById('ixchel_hablando_quieta'))
        disguise(document.getElementById('ixchel_hablando2_telefono'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', pregunta_de_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click',  respuestas_de_junajpu_a_ixchel);
    }, 3000);
}

function respuestas_de_junajpu_a_ixchel () {
    seguiente_memsaje.style.display = "none";
    show(document.getElementById('mensaje_repuesta_ixchel_a_junajpu_telefono'))
    show(document.getElementById('burbujas_escena3'))

    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', respuestas_de_junajpu_a_ixchel);
    }, 500);
}

function respuesta_correcta_E3 () {
    show(document.getElementById('plato_de_huevo_E3')) 
    show(document.getElementById('plato_de_sopa_E3')) 

}

// ------------------- Escena 3 ---------------------------------

// ------------------- Escena 4 ---------------------------------

function escena4() {
    lefted(document.getElementById('mensajes_de_respuestas'),'80')
    toped(document.getElementById('mensajes_de_respuestas'),'5')
    direccion(document.getElementById('mensajes_de_respuestas'),'column')
    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('plato_de_sopa_E3'))
    disguise(document.getElementById('plato_de_huevo_E3'))
    disguise(document.getElementById('junam_sentado'))
    disguise(document.getElementById('ixkin_sentada_E3'))
    disguise(document.getElementById('junajpu_hablando_telefono_quieto'))
    disguise(document.getElementById('ixchel_hablando_quieta'))
    disguise(document.getElementById('plato_de_sopa'))
    disguise(document.getElementById('mensaje_repuesta_ixchel_a_junajpu_telefono'))
    show(document.getElementById('ixkin_quieta_E4')) 
    show(document.getElementById('junam_quieto_E4')) 
    show(document.getElementById('junajpu_sonriendo_E4_quieto')) 
    seguiente_memsaje.addEventListener('click',  saludos_de_hijos_a_junajpu);
}

function saludos_de_hijos_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('ixkin_quieta_E4')) 
    show(document.getElementById('ixkin_cuerpo_completo_E4_hablando')) 
    change_message(document.getElementById('mensaje_pregunta_a_junajpu_ixkin_E4'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    setTimeout(() => {
        show(document.getElementById('ixkin_quieta_E4'))
        disguise(document.getElementById('ixkin_cuerpo_completo_E4_hablando'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', saludos_de_hijos_a_junajpu);
        seguiente_memsaje.addEventListener('click',  saludo_padre);
    }, 3000);
}

function saludo_padre () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    disguise(document.getElementById('junajpu_sonriendo_E4_quieto')) 
    show(document.getElementById('junajpu_cuerpo_completo_E4_hablando')) 
    change_message(document.getElementById('mensaje_respuestas_junajpu_E4'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_pregunta_junajpu_respuestas_hijos')) 
    setTimeout(() => {
        show(document.getElementById('junajpu_sonriendo_E4_quieto'))
        disguise(document.getElementById('junajpu_cuerpo_completo_E4_hablando'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', saludo_padre);
        seguiente_memsaje.addEventListener('click',  niños_le_preguntan_si_pueden_ir);
    }, 3000);
}

function niños_le_preguntan_si_pueden_ir () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_pregunta_junajpu_respuestas_hijos')) 
    disguise(document.getElementById('ixkin_quieta_E4')) 
    change_message(document.getElementById('mensaje_pregunta_a_junajpu_junam_E4'), array_opciones[contador][2].pregunta)
    change_message(document.getElementById('mensaje_pregunta_a_junajpu_ixkin_E4'), array_opciones[contador][2].pregunta)
    show(document.getElementById('mensaje_pregunta_junam_a_junajpu')) 
    show(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    disguise(document.getElementById('junam_quieto_E4')) 
    show(document.getElementById('ixkin_cuerpo_completo_E4_hablando2')) 
    show(document.getElementById('junam_cuerpo_completo_E4_hablando2')) 
    setTimeout(() => {
        show(document.getElementById('junam_quieto_E4'))
        show(document.getElementById('ixkin_quieta_E4'))
        disguise(document.getElementById('ixkin_cuerpo_completo_E4_hablando2'))
        disguise(document.getElementById('junam_cuerpo_completo_E4_hablando2'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', niños_le_preguntan_si_pueden_ir);
        seguiente_memsaje.addEventListener('click', desisicion_junajpu_a_sus_hijos );
    }, 3000);
}


function desisicion_junajpu_a_sus_hijos () {
    seguiente_memsaje.style.display = "none";
    disguise(document.getElementById('mensaje_pregunta_junam_a_junajpu')) 
    disguise(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    show(document.getElementById('burbujas_escena4'))
    setTimeout(() => {
        //toped(contenedor_mensajes,'55')
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', desisicion_junajpu_a_sus_hijos);
    }, 500);
}


function repuesta_erronear_E4 () {
    disguise(document.getElementById('junam_quieto_E4'))
    disguise(document.getElementById('ixkin_quieta_E4'))
    show(document.getElementById('ixkin_cuerpo_completo_E4_llorando'))
    show(document.getElementById('junam_cuerpo_completo_E4_llorando'))
    disguise(document.getElementById('mensaje_pregunta_junam_a_junajpu')) 
    disguise(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    change_message(document.getElementById('mensaje_respuestas_junajpu_E4'), array_opciones[contador][1].pregunta)
    setTimeout(() => {
        show(document.getElementById('mensaje_pregunta_junajpu_respuestas_hijos'))
    }, 100);
}

function respuesta_correcta_E4 () {
    disguise(document.getElementById('mensaje_pregunta_junajpu_respuestas_hijos'))
    disguise(document.getElementById('mensaje_pregunta_junam_a_junajpu')) 
    disguise(document.getElementById('mensaje_pregunta_ixkina_a_junajpu')) 
    disguise(document.getElementById('junam_quieto_E4'))
    disguise(document.getElementById('ixkin_quieta_E4'))
    disguise(document.getElementById('ixkin_cuerpo_completo_E4_llorando'))
    disguise(document.getElementById('junam_cuerpo_completo_E4_llorando'))
    disguise(document.getElementById('junajpu_sonriendo_E4_quieto')) 
    cambiar_fondo(contendor,fondo_campo_E4)
        setTimeout(() => {
            show(document.getElementById('junam_sentandose')) 
            show(document.getElementById('junajpu_sentandose_E4')) 
            show(document.getElementById('ixkin_sentandose')) 
            show(document.getElementById('niños_jugando_pelota')) 

            setTimeout(() => {
                disguise(document.getElementById('junam_sentandose')) 
                disguise(document.getElementById('junajpu_sentandose_E4')) 
                disguise(document.getElementById('ixkin_sentandose'))
                show(document.getElementById('ixkik_sentada_E4')) 
                show(document.getElementById('juhajpu_sentado_E4')) 
                show(document.getElementById('junam_sentado_E4')) 

                setTimeout(() => {
                    change_message(document.getElementById('mensaje_pensamiento_junajpu_repuesta'), array_opciones[contador][1].correcta)
                    show(document.getElementById('mensaje_pensamiento_junajpu'))
                }, 1000);
            }, 7000);
        },1000);


    
}
// ------------------- Escena 4 ---------------------------------

// ------------------- Escena 5 ---------------------------------

function escena5(){            
    lefted(document.getElementById('mensajes_de_respuestas'),'0')
    toped(document.getElementById('mensajes_de_respuestas'),'5')
    direccion(document.getElementById('mensajes_de_respuestas'),'row')
    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('ixkik_sentada_E4')) 
    disguise(document.getElementById('juhajpu_sentado_E4')) 
    disguise(document.getElementById('junam_sentado_E4')) 
    disguise(document.getElementById('junam_sentandose')) 
    disguise(document.getElementById('junajpu_sentandose_E4')) 
    disguise(document.getElementById('ixkin_sentandose')) 
    disguise(document.getElementById('niños_jugando_pelota')) 
    disguise(document.getElementById('junajpu_sonriendo_E4_quieto2'))
    disguise(document.getElementById('mensaje_pensamiento_junajpu'))
    disguise(document.getElementById('ixkin_quieta_E42'))
    disguise(document.getElementById('junam_quieto_E42'))
    show(document.getElementById('ixcehl_barriendo_E5'))
    show(document.getElementById('ixkin_en_mesa_quieta'))
    show(document.getElementById('junam_en_mesa_quieta'))
    show(document.getElementById('junajpu_acostado_E5'))
    show(document.getElementById('libro_uno'))
    show(document.getElementById('libro_dos'))
    seguiente_memsaje.addEventListener('click', hijos_preguntan_a_ixchel);
}

function hijos_preguntan_a_ixchel () {
    seguiente_memsaje.style.pointerEvents = "none";
    show(document.getElementById('ixkin_hablando_E5'))
    show(document.getElementById('junam_habalndo_E5'))
    disguise(document.getElementById('ixkin_en_mesa_quieta'))
    disguise(document.getElementById('junam_en_mesa_quieta'))
    change_message(document.getElementById('mensaje_ixkin_a_ixcehel_pregunta'), array_opciones[contador][0].pregunta)
    change_message(document.getElementById('mensaje_junam_a_ixcehel_pregunta'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_ixkin_a_ixcehel'))
    show(document.getElementById('mensaje_junam_a_ixcehel'))
    setTimeout(() => {
        disguise(document.getElementById('ixkin_hablando_E5'))
        disguise(document.getElementById('junam_habalndo_E5'))
        show(document.getElementById('ixkin_en_mesa_quieta'))
        show(document.getElementById('junam_en_mesa_quieta'))        
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', hijos_preguntan_a_ixchel);
        seguiente_memsaje.addEventListener('click', ixchel_responde_y_pregunta_a_junajpu );
    }, 3000);
}

function ixchel_responde_y_pregunta_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_ixkin_a_ixcehel'))
    disguise(document.getElementById('mensaje_junam_a_ixcehel'))
    disguise(document.getElementById('ixcehl_barriendo_E5'))
    change_message(document.getElementById('mensaje_ixchel_a_sus_a_junajpu_pregunta'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_ixchel_a_sus_a_junajpu'))
    show(document.getElementById('ixchel_hablando_barriendo'))
    setTimeout(() => {       
        change_message(document.getElementById('mensaje_ixchel_a_sus_a_junajpu_pregunta'), array_opciones[contador][1].pregunta)
        disguise(document.getElementById('ixchel_hablando_barriendo'))
        show(document.getElementById('ixcehl_barriendo_E5'))
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', ixchel_responde_y_pregunta_a_junajpu);
        seguiente_memsaje.addEventListener('click', desicion_de_junajpu_de_ixchel );
    }, 3000);
}

function desicion_de_junajpu_de_ixchel () {
    seguiente_memsaje.style.display = "none";
    disguise(document.getElementById('mensaje_ixchel_a_sus_a_junajpu'))
    show(document.getElementById('burbujas_escena5'))
    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', desicion_de_junajpu_de_ixchel);
    }, 500);
}

function respuesta_correcta_E5 () {
    disguise(document.getElementById('junajpu_acostado_E5'))
    show(document.getElementById('junajpu_hablando_E5'))
    change_message(document.getElementById('mensaje_junajpu_despues_de_desicion_respuesta'), array_opciones[contador][1].correcta)
    show(document.getElementById('mensaje_junajpu_despues_de_desicion'))
    setTimeout(() => {       
        disguise(document.getElementById('junajpu_hablando_E5'))
        show(document.getElementById('junajpu_acostado_E5'))
    }, 5000);
}



// ------------------- Escena 5 ---------------------------------


// ------------------- Escena 6 ---------------------------------

function escena6 () {
    lefted(document.getElementById('mensajes_de_respuestas'),'20')
    toped(document.getElementById('mensajes_de_respuestas'),'5')
    direccion(document.getElementById('mensajes_de_respuestas'),'row')

    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('mensaje_ixchel_a_sus_a_junajpu'))
    disguise(document.getElementById('ixcehl_barriendo_E5'))
    disguise(document.getElementById('mensaje_junajpu_despues_de_desicion'))
    disguise(document.getElementById('junajpu_acostado_E5'))
    disguise(document.getElementById('ixkin_en_mesa_quieta'))
    disguise(document.getElementById('junam_en_mesa_quieta'))
    disguise(document.getElementById('libro_uno'))
    disguise(document.getElementById('libro_dos'))
    show(document.getElementById('junam_enfermo'))
    show(document.getElementById('ixchel_acostada_quieta'))
    show(document.getElementById('junajpu_acostado_quieto'))
    seguiente_memsaje.addEventListener('click', junam_esta_enfermo);
}

function junam_esta_enfermo() {
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_de_junam_enfermo_E6_pregunta'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_de_junam_enfermo_E6'))
    setTimeout(() => {       
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', junam_esta_enfermo);
        seguiente_memsaje.addEventListener('click', ixchel_responde_a_junam );
    }, 2000);
}

function ixchel_responde_a_junam () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_de_junam_enfermo_E6'))
    change_message(document.getElementById('mensaje_de_ixchel_E6_pregunta'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_de_ixchel_E6'))
    setTimeout(() => {       
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', ixchel_responde_a_junam);
        seguiente_memsaje.addEventListener('click',  junajpu_a_responde_a_ixchel);
    }, 2000);
}


function junajpu_a_responde_a_ixchel () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_de_ixchel_E6'))
    disguise(document.getElementById('junajpu_acostado_quieto'))
    show(document.getElementById('junajpu_habalndo_acostado_E6'))
    change_message(document.getElementById('mensaje_de_junajpu_E6_pregunta'), array_opciones[contador][1].pregunta)
    show(document.getElementById('mensaje_de_junajpu_E6'))
    setTimeout(() => {       
        show(document.getElementById('junajpu_acostado_quieto'))
        disguise(document.getElementById('junajpu_habalndo_acostado_E6'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', junajpu_a_responde_a_ixchel);
        seguiente_memsaje.addEventListener('click',  respuestas_de_junajpu_junam_enfermo);
    }, 4000);
}

function respuestas_de_junajpu_junam_enfermo (){
    seguiente_memsaje.style.display = "none";
    disguise(document.getElementById('mensaje_de_junajpu_E6'))
    show(document.getElementById('burbujas_escena6'))

    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', respuestas_de_junajpu_junam_enfermo);
    }, 500);
}

function respuesta_incorrecta_E6 () {
    disguise(document.getElementById('junajpu_acostado_quieto'))
    disguise(document.getElementById('ixchel_acostada_quieta'))
    show(document.getElementById('ixchel_enferma_quieta'))
    show(document.getElementById('junajpu_acostandose'))
}

function respuesta_correcta_E6 () {
    disguise(document.getElementById('mensaje_de_junajpu_E6'))
    disguise(document.getElementById('ixchel_acostada_quieta'))
    disguise(document.getElementById('ixchel_enferma_quieta'))
    disguise(document.getElementById('junajpu_acostado_quieto'))
    show(document.getElementById('ixchel_moviendose_acostarse'))
    disguise(document.getElementById('junajpu_acostandose'))
    setTimeout(() => { 
        disguise(document.getElementById('junajpu_acostandose'))
    },500);

    show(document.getElementById('junajpu_levantandose'))
    setTimeout(() => {       
        show(document.getElementById('ixchel_acostada_quieta'))
        disguise(document.getElementById('ixchel_moviendose_acostarse'))
        disguise(document.getElementById('junajpu_acostado_quieto'))
    }, 2000);
}
// ------------------- Escena 6 ---------------------------------

// ------------------- Escena 7 ---------------------------------


function escena7(){
    disguise(document.getElementById('junajpu_acostado_quieto'))
    lefted(document.getElementById('mensajes_de_respuestas'),'5')
    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('junajpu_levantandose'))
    disguise(document.getElementById('ixchel_acostada_quieta'))
    disguise(document.getElementById('junam_enfermo'))
    show(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    seguiente_memsaje.addEventListener('click', hija_pidiendo_ayuda);
}

function hija_pidiendo_ayuda () {
    seguiente_memsaje.style.pointerEvents = "none";
    cambiar_fondo(contendor,fondo_cama_E7)
    disguise(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    show(document.getElementById('junamnoj_E7'))
    show(document.getElementById('junajpu_acostado_quieto_E7'))
    show(document.getElementById('ixkin_sentada_llorando'))
    setTimeout(() => {       
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', hija_pidiendo_ayuda);
        seguiente_memsaje.addEventListener('click',  hija_habla_a_mama);
    }, 2000);
}

function  hija_habla_a_mama () {
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_ixkin_E7_pregunta'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_ixkin_E7'))
    setTimeout(() => {       
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', hija_habla_a_mama);
        seguiente_memsaje.addEventListener('click',  respusta_ixchel_a_ixkin);
    }, 2000);
}

function respusta_ixchel_a_ixkin () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('junamnoj_E7'))
    disguise(document.getElementById('junajpu_acostado_quieto_E7'))
    disguise(document.getElementById('ixkin_sentada_llorando'))
    disguise(document.getElementById('mensaje_ixkin_E7'))
    cambiar_fondo(contendor,imagenes_fondo[contador])
    show(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    setTimeout(() => {       
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', respusta_ixchel_a_ixkin);
        seguiente_memsaje.addEventListener('click',  repuesta_mama);
    }, 2000);
}

function repuesta_mama () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    change_message(document.getElementById('mensaje_ixchel_E7_pregunta'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_ixchel_E7'))
    show(document.getElementById('ixchel_hablando_en_la_cocina_E7'))
    setTimeout(() => {       
        disguise(document.getElementById('ixchel_hablando_en_la_cocina_E7'))
        show(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', repuesta_mama);
        seguiente_memsaje.addEventListener('click',  ixchel_pregunta_a_junajpu);
    }, 3000);
}

function ixchel_pregunta_a_junajpu  () {
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    show(document.getElementById('ixchel_hablando_en_la_cocina2_E7'))
    change_message(document.getElementById('mensaje_ixchel_E7_pregunta'), array_opciones[contador][1].pregunta)
    setTimeout(() => {       
        disguise(document.getElementById('ixchel_hablando_en_la_cocina2_E7'))
        show(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', ixchel_pregunta_a_junajpu);
        seguiente_memsaje.addEventListener('click',respuestas_de_junajpu_E7  );
    }, 3000);
}


function respuestas_de_junajpu_E7 () {
    disguise(document.getElementById('mensaje_ixchel_E7'))
    disguise(document.getElementById('ixchel_quieta_en_la_cocina_E7'))
    show(document.getElementById('burbujas_escena7'))
    cambiar_fondo(contendor,fondo_cama_E7)
    show(document.getElementById('junamnoj_E7'))
    show(document.getElementById('junajpu_acostado_quieto_E7'))
    show(document.getElementById('ixkin_sentada_llorando'))
    seguiente_memsaje.style.display = "none";
    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', respuestas_de_junajpu_E7);
    }, 500);
}


function respuesta_correcta_E7 () {
    disguise(document.getElementById('junamnoj_E7'))
    disguise(document.getElementById('junajpu_acostado_quieto_E7'))
    disguise(document.getElementById('ixkin_sentada_llorando'))
    show(document.getElementById('ixkin_sentada_quieta'))
    show(document.getElementById('junamnoj_junajpu_E7'))
}
// ------------------- Escena 7 ---------------------------------

// ------------------- Escena 8 ---------------------------------

function escena8(){
    lefted(document.getElementById('mensajes_de_respuestas'),'25')
    toped(document.getElementById('mensajes_de_respuestas'),'10')
    direccion(document.getElementById('mensajes_de_respuestas'),'row')
    seguiente_memsaje.style.display = "flex";
    seguiente_memsaje.style.pointerEvents = "auto";
    disguise(document.getElementById('ixkin_sentada_quieta'))
    disguise(document.getElementById('junamnoj_junajpu_E7'))
    show(document.getElementById('batz_caminando_E8'))
    show(document.getElementById('ixchel_lavando_E8'))
    show(document.getElementById('junajpu_quieto'))
    setTimeout(() => {       
        disguise(document.getElementById('batz_caminando_E8'))

    }, 4000);
    seguiente_memsaje.addEventListener('click', saludos_de_junajpu_a_ixcehl);
}


function saludos_de_junajpu_a_ixcehl () {
    seguiente_memsaje.style.pointerEvents = "none";
    show(document.getElementById('junajpu_hablando_E8'))
    disguise(document.getElementById('junajpu_quieto'))
    change_message(document.getElementById('mensaje_ixkin_E8_pregunta'), array_opciones[contador][0].pregunta)
    show(document.getElementById('mensaje_junajpu_E8'))
    setTimeout(() => {       
        disguise(document.getElementById('junajpu_hablando_E8'))
        show(document.getElementById('junajpu_quieto'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', saludos_de_junajpu_a_ixcehl);
        seguiente_memsaje.addEventListener('click', saludos_de_ixchel_a_junajpu );
    }, 3000);
}


function saludos_de_ixchel_a_junajpu (){
    seguiente_memsaje.style.pointerEvents = "none";
    disguise(document.getElementById('mensaje_junajpu_E8'))
    change_message(document.getElementById('mensaje_ixchel_E8_pregunta'), array_opciones[contador][0].correcta)
    show(document.getElementById('mensaje_ixchel_E8'))
    show(document.getElementById('ixchel_hablando_E8'))
    disguise(document.getElementById('ixchel_lavando_E8'))
    setTimeout(() => {       
        disguise(document.getElementById('ixchel_hablando_E8'))
        show(document.getElementById('ixchel_lavando_E8'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', saludos_de_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click',  preguta_de_ixchel_a_junajpu);
    }, 3000);
}

function preguta_de_ixchel_a_junajpu () {
    seguiente_memsaje.style.pointerEvents = "none";
    change_message(document.getElementById('mensaje_ixchel_E8_pregunta'), array_opciones[contador][1].pregunta)
    disguise(document.getElementById('ixchel_lavando_E8'))
    show(document.getElementById('ixchel_hablando2_E8'))
    setTimeout(() => {       
        disguise(document.getElementById('ixchel_hablando2_E8'))
        show(document.getElementById('ixchel_quieta_E8'))
        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.removeEventListener('click', preguta_de_ixchel_a_junajpu);
        seguiente_memsaje.addEventListener('click',  respuestas_junajpu_E8);
    }, 3000);
}


function respuestas_junajpu_E8 () {
    seguiente_memsaje.style.display = "none";
    disguise(document.getElementById('mensaje_ixchel_E8'))
    show(document.getElementById('burbujas_escena8'))
    setTimeout(() => {
        contenedor_mensajes.style.display = "flex";
        generarHTMLPorId(contador)
        seguiente_memsaje.removeEventListener('click', respuestas_junajpu_E8);
    }, 500);
}


function respuesta_correcta_E8 () {
    disguise(document.getElementById('junajpu_quieto'))
    show(document.getElementById('junajpu_lavando_E8'))
    disguise(document.getElementById('ixchel_quieta_E8'))
    show(document.getElementById('ixchel_lavando_E8'))

}
// ------------------- Escena 8 ---------------------------------



var escenas_ = [escena_1,escena2,escena3,escena4,escena5,escena6,escena7,escena8]

document.querySelector('.close-btn').addEventListener('click', function() {
    modal_niveles.style.opacity = '0';
    modal_niveles.style.visibility = 'hidden';
    escenas_[contador]();
    
});
document.addEventListener("DOMContentLoaded", function() {

function deshabilitarOpciones() {
        document.querySelectorAll('.mensajes_de_respuestas').forEach(boton => {
            boton.disabled = true;
        });
    }

time_teminar = setTimeout(function(){
        mostrarDesplegable()
        modal_text.textContent =  array_opciones[contador][0].escena_actual
        modal_title.textContent = `¡Explora la historia y construye un futuro de equidad!`
        document.getElementById('header_principal').style.display = 'block'
        document.getElementById('barra_id').style.display = 'block'
        document.getElementById('nivel').style.display = 'block'
        document.getElementById('contenedor').style.display = 'flex'
        document.getElementById('vidas').style.display = 'block'
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
    ambiente.pause()

}

