document.addEventListener("DOMContentLoaded", function() {
    // Obtener elementos del DOM
    const gif_image = document.getElementById('gifImage');
    const gif_hijo = document.getElementById('gifhijo');
    const gif_hijo2 = document.getElementById('gifhijo2');
    const gif_hijo3 = document.getElementById('gifhijo3');
    const static_image = document.getElementById('staticImage');
    const message_mama1 = document.getElementById('messageCard');
    const message_mama2 = document.getElementById('messageCard2');
    const message_hijo1 = document.getElementById('messagehijo1');
    const message_hijo2 = document.getElementById('messagehijo2');
    const message_hijo3 = document.getElementById('messagehijo3');
    const mensaje_cambia_hijo = document.getElementById('mensaje_hijo');
    const mensaje_cambia_hijo2 = document.getElementById('mensaje_hijo2');
    const mensaje_cambia_hijo3 = document.getElementById('mensaje_hijo3');
    const mensaje_cambia_madre = document.getElementById('mensaje_mama');
    const mensaje_cambia_madre2 = document.getElementById('mensaje_mama2');
    const contendor = document.getElementById('contenedor');
    const gifImage2 = document.getElementById('gifImage2');
    const gifImage3 = document.getElementById('gifImage3');
    const static_image2 = document.getElementById('staticImage2');
    const opciones = document.getElementById('respuestas');
    const opcion1 = document.getElementById('opcion1');
    const opcion2 = document.getElementById('opcion2');
    const opcion3 = document.getElementById('opcion3');
    const seguiente_memsaje = document.getElementById('siguiente_mensaje');
    const siguiente_escena = document.getElementById('siguiente_escena');
    const regresar = document.getElementById('regresar');
    const close_modal = document.querySelector('.close_modal');
    let modal = document.getElementById("modal");
    const cerrar_modal = document.getElementById('cerrar_modal');

    
    
    
let array_opciones = [

    {
        opcione: ["No, tu hazlo","No, Tu eres mujer","Esta bien madre, ayudare"],
        correcta: ["false","false","true"]
    },
    {
        opcione: ["No, hiciste lo correcto","Si tengo que ayudarla","Que ella limpie sola"],
        correcta: ["false","true","false"]
    },
    
];


let tamaño = 100/array_opciones.length;

function cargar_barra (){
    const barra = document.getElementById('barra');
    barra.value += tamaño;
}
function asignar_opciones(escena){
    posicion_opcion = array_opciones[escena];

    //cambiando la respuesta correcta
    opcion1.dataset.correct = posicion_opcion.correcta[0];
    opcion2.dataset.correct = posicion_opcion.correcta[1];
    opcion3.dataset.correct = posicion_opcion.correcta[2];

    //cambiando el contenido de las opciones
    opcion1.textContent = posicion_opcion.opcione[0]
    opcion2.textContent = posicion_opcion.opcione[1]
    opcion3.textContent = posicion_opcion.opcione[2]

    opciones.style.pointerEvents = "auto"

};



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

    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        disguise(gif_image);
        show(static_image);

        seguiente_memsaje.addEventListener('click', mostrarMensajeMama1);
    }, 3500);

    asignar_opciones(contador);
}

function mostrarMensajeMama1() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_madre, 'Hola hijo querido');
        show(message_mama1);

        seguiente_memsaje.addEventListener('click', mostrarMensajeHijo1);
    }, 500);
}

function mostrarMensajeHijo1() {
    seguiente_memsaje.removeEventListener('click', mostrarMensajeMama1);
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_hijo, 'Hola mamá...');
        show(message_hijo1);
        seguiente_memsaje.removeEventListener('click', mostrarMensajeHijo1);
        seguiente_memsaje.addEventListener('click', mostrarMensajeMama2);
    }, 500);
}

function mostrarMensajeMama2() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_madre, '¿Cómo estás hijo?');
        seguiente_memsaje.removeEventListener('click', mostrarMensajeMama2);
        seguiente_memsaje.addEventListener('click', mostrarMensajeHijo2);
    }, 500);
}

function mostrarMensajeHijo2() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_hijo, 'mmm...');
        seguiente_memsaje.removeEventListener('click', mostrarMensajeHijo2);
        seguiente_memsaje.addEventListener('click', mostrarMensajeHijo3);
    }, 500);
}

function mostrarMensajeHijo3() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_hijo, 'Bien.');
        seguiente_memsaje.removeEventListener('click', mostrarMensajeHijo3);

        seguiente_memsaje.addEventListener('click', mostrarSolicitudMadre);
    }, 500);
}

function mostrarSolicitudMadre() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        disguise(message_hijo1);
        change_message(mensaje_cambia_madre, 'Hijo, ¿podrías ayudarme?');
        seguiente_memsaje.removeEventListener('click', mostrarSolicitudMadre);

        seguiente_memsaje.addEventListener('click', mostrarOpciones);
    }, 500);
}

function mostrarOpciones() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "none";
        opciones.style.display = "flex";
        seguiente_memsaje.removeEventListener('click', mostrarOpciones);
        seguiente_memsaje.style.display = "none";
    }, 500);
}

function escena_2() {
    contador = 1;

    setTimeout(() => {
        opciones.style.display = "none";
        seguiente_memsaje.style.display = "flex";

        cambiar_ubicacion_porcentaje(opciones, '60', '25');
        disguise(gif_image);
        disguise(static_image);
        disguise(message_mama1);
        disguise(message_hijo1);
        disguise(gif_hijo);
        disguise(static_image2);
        cambiar_fondo(contendor, 'imgs/nivel2/escena1.jpg');
        show(gif_hijo2);

        seguiente_memsaje.style.pointerEvents = "auto";
        seguiente_memsaje.addEventListener('click', mostrarReflexionHijo);
    }, 0);

    asignar_opciones(contador);
}

function mostrarReflexionHijo() {

    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        seguiente_memsaje.style.pointerEvents = "auto";
        change_message(mensaje_cambia_hijo2, 'Creo que tenía que ayudar a mi mamá');
        show(message_hijo2);

        seguiente_memsaje.addEventListener('click', habilitarBotonSiguiente);
    }, 500);
}

function habilitarBotonSiguiente() {
    seguiente_memsaje.removeEventListener('click', mostrarReflexionHijo);
    seguiente_memsaje.style.pointerEvents = "none"; 
    setTimeout(() => {
        opciones.style.display = "flex";   
        seguiente_memsaje.style.display = "none";

    }, 500);
}


    function escena_3() {
        contador = 2;
        seguiente_memsaje.style.display = "flex";
        seguiente_memsaje.style.pointerEvents = "auto"; 
        opciones.style.display = "none";
        disguise(gif_hijo2);
        disguise(message_hijo2);
        cambiar_fondo(contendor, 'imgs/nivel2/escena2.avif');
        show(gif_hijo3);
        seguiente_memsaje.removeEventListener('click', habilitarBotonSiguiente);
        seguiente_memsaje.addEventListener('click', mensaje_divertido);

    }
function mensaje_divertido() {
    seguiente_memsaje.style.pointerEvents = "none";
    setTimeout(() => {
        change_message(message_hijo3, '¡Qué divertido!');
        show(message_hijo3);
    seguiente_memsaje.removeEventListener('click', mensaje_divertido);
    seguiente_memsaje.style.display = "none";

    salir()

    }, 500);
}
    escena_1();

    let vidas = 3;

    document.querySelectorAll('.opcion').forEach(boton => {
        boton.addEventListener('click', function() {
            const esCorrecta = boton.getAttribute('data-correct') === 'true';

            if (!esCorrecta) {
                vidas--;
                actualizarVidas();
                if (vidas === 0) {
                    modal.classList.add('modal_show');
                    deshabilitarOpciones();
                    
                }
            } else if (esCorrecta) {
                launchConfetti();
                reiniciar_tiempos();
                opciones.style.pointerEvents = "none"
                setTimeout(() => {
                    siguiente_escena.style.display = "block"
                    siguiente_escena.style.pointerEvents = "auto"
                    siguiente_escena.addEventListener('click', () => {
                            if (contador === 0) {

                                escena_2();

                            } else if (contador === 1) {
                                escena_3();
                            }

                            cargar_barra()
                    siguiente_escena.style.display = "none"
                    siguiente_escena.style.pointerEvents = "none"

                });
                }, 4000);
                
            }
        });
    });

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

    function deshabilitarOpciones() {
        document.querySelectorAll('.opcion').forEach(boton => {
            boton.disabled = true;
        });
    }

    // Inicializa las vidas
    actualizarVidas();

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
    window.location.href = 'dashboard';
}