
console.log(listaImagenes)
function mostrarDesplegable() {
    document.getElementById('desplegableInstrucciones').style.display = 'flex'
    
    document.body.classList.add('modal-visible');  // Añade clase al body para evitar scroll
    document.getElementById('desplegableInstrucciones').classList.add('desplegable-visible'); // Muestra el modal
}

function cerrarDesplegable() {
    document.getElementById('desplegableInstrucciones').style.display = 'none'

    document.body.classList.remove('modal-visible');  // Remueve clase del body
    document.getElementById('desplegableInstrucciones').classList.remove('desplegable-visible'); // Oculta el modal
}

const botonSiguienteInstruccion = document.getElementById('botonSiguienteInstruccion');
const botonVamos = document.getElementById('botonVamos');
const imagenes = document.getElementById('imagenInstruccion');
const textoInstruccion = document.getElementById('textoInstruccion');

const texto1 = 'Mueve las piezas del rompecabezas hasta los espacios vacíos. Si los espacios están llenos, puedes mover una pieza en un espacio lleno y la pieza regresará a su posición inicial.';
const texto2 = 'Cuando coloques la pieza en un espacio correcto, se desplegará una pregunta junto con las respuestas. Debes escoger la respuesta que más creas conveniente. No hay respuestas buenas ni malas.';
const texto3 = 'Al terminar el rompecabezas podrás ver la imagen escondida y así avanzar al siguiente nivel.';

const listaDescripcion = [texto1, texto2, texto3];
let contadorSiguienteImagen = 0;

function cambiarImagen() {
    if (contadorSiguienteImagen >= listaImagenes.length ) {
        botonSiguienteInstruccion.style.display = 'none';
        botonVamos.style.display = 'block';
    } else {
        imagenes.src = listaImagenes[contadorSiguienteImagen];
        textoInstruccion.textContent = listaDescripcion[contadorSiguienteImagen];
        contadorSiguienteImagen++;
    }
}

cambiarImagen();



// ---------------------- recuperar el id -------------------
const userId = localStorage.getItem('userId');

console.log(userId)

// ---------------------- recuperar el id -------------------


// ------------------- intentos --------------------

let intentos_1 = localStorage.getItem('intentos_1');
if (intentos_1 === null) {
    intentos_1 = 0;
} else {
    intentos_1 = parseInt(intentos_1, 10); // Asegúrate de convertirlo a número
}


intentos_1 += 1;

localStorage.setItem('intentos_1', intentos_1);

console.log(intentos_1)
// ------------------- intentos --------------------


// ------------------------ completar nivel --------------------
let contador_nivel_1 = 0 ;


let nivel_completado_1 = localStorage.getItem('nivel_completado_1');
if (nivel_completado_1 === null) {
    nivel_completado_1 = 0;
} else {
    nivel_completado_1 = parseInt(nivel_completado_1, 10); // Asegúrate de convertirlo a número
}



console.log(nivel_completado_1)
// ------------------------ completar nivel --------------------







// ----------------------- envio de informacion -----------------------------


// ----------------------- envio de informacion -----------------------------
function sendDataToApi(usuario_id, pregunta_id, completado, intentos, puntuacion, estado_proceso, texto_respuesta_preguntas, texto_respuesta_respuestas, status) {
    // Crear el objeto de datos a enviar
    const data = {
        usuario_id: usuario_id,
        pregunta_id: pregunta_id,
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
    fetch('https://junamnoj.foxint.tech/api/progreso-usuario', options)
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
// ----------------------- envio de informacion -----------------------------






// --------------------------- Pantalla de carga ------------------------------
const cargando = document.getElementById("cargando");
const header = document.getElementById("header");
const nivel = document.getElementById("nivel1");
const barra_id = document.getElementById("barra_id");
const piezasss1 = document.getElementById("casilla_1");
const piezasss2 = document.getElementById("casilla_2");
const piezasss3 = document.getElementById("casilla_3");
const piezasss4 = document.getElementById("casilla_4");
const piezasss5 = document.getElementById("casilla_5");
const piezasss6 = document.getElementById("casilla_6");
const espacioss = document.getElementById("targetContainer");
const boton_regresar = document.getElementById("regresar");

time_teminar = setTimeout(function () {
    mostrarDesplegable()
    header.style.display = "block";
    nivel.style.display = "block";
    barra_id.style.display = "block";
    barra_id.style.display = "block";
    piezasss1.style.display = "block";
    piezasss2.style.display = "block";
    piezasss3.style.display = "block";
    piezasss4.style.display = "block";
    piezasss5.style.display = "block";
    piezasss6.style.display = "block";
    espacioss.style.display = "grid";
    cargando.style.display = "none";
    boton_regresar.style.display = "block";
    contador.style.display = "block";
    musica.play();
}, 5000);

// ---------------------------------- Audio ------------------------------------

var musica = document.getElementById("musica_fondo");
var audio_correcto = document.getElementById("audio_correcto");
var audio_incorrecto = document.getElementById("audio_incorrecto");
var aplausos = document.getElementById("aplausos");

// ---------------------------------- Audio ------------------------------------

// -------------------------------- Logica para loch ( Movil )---------------------------

document.addEventListener("DOMContentLoaded", () => {
    const piezas = document.querySelectorAll(".pieza");
    const espacios = document.querySelectorAll(".espacio");
    let active = false;
    let currentX;
    let currentY;
    let initialX;
    let initialY;
    let xOffset = 0;
    let yOffset = 0;
    let draggedPiece = null;

    // Función para restablecer las piezas al cargar la página
    function initializePiezas() {
        piezas.forEach((pieza) => {
            // Restablecer estilos y atributos
            pieza.style.position = "static";
            pieza.style.transform = "none";
            pieza.style.pointerEvents = "auto";
            pieza.setAttribute("draggable", "true");

            // Verificar si la pieza está en su posición correcta
            const piezaIndex = pieza.getAttribute("data-index");
            const parentEspacio = pieza.parentElement;

            if (
                parentEspacio.classList.contains("espacio") &&
                parentEspacio.getAttribute("data-index") === piezaIndex
            ) {
                pieza.setAttribute("draggable", "false");
                pieza.style.pointerEvents = "none";
            }
        });
    }

    initializePiezas();

    piezas.forEach((pieza) => {
        pieza.setAttribute("data-original-parent", pieza.parentElement.id);

        pieza.addEventListener("touchstart", dragStart, false);
        pieza.addEventListener("touchend", dragEnd, false);
        pieza.addEventListener("touchmove", drag, false);

        pieza.addEventListener("dragstart", (event) => {
            event.dataTransfer.setData("text", event.target.id);
        });
    });

    function dragStart(e) {
        if (e.target.classList.contains("pieza")) {
            active = true;
            draggedPiece = e.target;

            // Hacer que la pieza desaparezca momentáneamente
            draggedPiece.style.visibility = "hidden";
            setTimeout(() => {
                draggedPiece.style.visibility = "visible";
            }, 130);

            draggedPiece.style.position = "absolute";
            draggedPiece.style.zIndex = "1000";

            initialX = e.touches ? e.touches[0].clientX : e.clientX;
            initialY = e.touches ? e.touches[0].clientY : e.clientY;

            const rect = draggedPiece.getBoundingClientRect();
            xOffset = initialX - (rect.left + rect.width / 2);
            yOffset = initialY - (rect.top + rect.height / 2);

            currentX = initialX - xOffset;
            currentY = initialY - yOffset;

            setTranslate(currentX, currentY, draggedPiece);
        }
    }

    function dragEnd(e) {
        active = false;
        draggedPiece.style.zIndex = "";

        const piezaIndex = draggedPiece.getAttribute("data-index");
        let placed = false;

        espacios.forEach((espacio) => {
            const espacioIndex = espacio.getAttribute("data-index");
            const existingPiece = espacio.querySelector(".pieza");

            if (
                isDroppedInEspacio(
                    e.changedTouches ? e.changedTouches[0].clientX : e.clientX,
                    e.changedTouches ? e.changedTouches[0].clientY : e.clientY,
                    espacio
                )
            ) {
                if (!existingPiece || existingPiece === draggedPiece) {
                    espacio.appendChild(draggedPiece);
                    draggedPiece.style.position = "static";
                    draggedPiece.style.transform = "none";
                    xOffset = 0;
                    yOffset = 0;
                    placed = true;

                    if (piezaIndex === espacioIndex) {
                        audio_correcto.play();
                        setTimeout(() => {
                            audio_correcto.pause();
                            audio_correcto.currentTime = 0;
                        }, 1000);
                        draggedPiece.setAttribute("draggable", "false");
                        draggedPiece.style.pointerEvents = "none";
                        mostrarPregunta(piezaIndex);
                        //mostrarModal();
                    } else {
                        audio_incorrecto.play();
                        setTimeout(() => {
                            audio_incorrecto.pause();
                            audio_incorrecto.currentTime = 0;
                        }, 500);
                    }
                }
            }
        });

        if (!placed) {
            // Volver a la posición original si no se coloca en un contenedor permitido
            let originalParent = document.getElementById(
                draggedPiece.getAttribute("data-original-parent")
            );
            originalParent.appendChild(draggedPiece);
            draggedPiece.style.position = "static";
            draggedPiece.style.transform = "none";
            xOffset = 0;
            yOffset = 0;
        }
    }

    function drag(e) {
        if (active) {
            e.preventDefault();

            currentX =
                (e.touches ? e.touches[0].clientX : e.clientX) -
                initialX +
                xOffset;
            currentY =
                (e.touches ? e.touches[0].clientY : e.clientY) -
                initialY +
                yOffset;

            setTranslate(currentX, currentY, draggedPiece);
        }
    }

    function setTranslate(xPos, yPos, el) {
        el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
    }

    function isDroppedInEspacio(x, y, espacio) {
        const rect = espacio.getBoundingClientRect();
        return (
            x > rect.left && x < rect.right && y > rect.top && y < rect.bottom
        );
    }

    // -------------------------------- Logica para loch ( Movil ) ---------------------------

    // -------------------------------- Logica para loch ( PC ) ------------------------------

    // Funciones allowDrop y drop para pc
    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event) {
        event.preventDefault();
        let data = event.dataTransfer.getData("text");
        let pieza = document.getElementById(data);
        let piezaIndex = pieza.getAttribute("data-index"); // id de la pieza
        let espacioIndex = event.target.getAttribute("data-index"); // id de del espacio
        let existingPiece = event.target.querySelector(".pieza"); // Ya hay una pieza en ese espacio

        // --------------------------------- Revisión de existencia de pieza en espacio ---------------------------------
        if (event.target.classList.contains("espacio")) {
            // ------------ Evaluacion de si el espacio esta vacio o es la misma pieza que se quiere colocar ------------
            if (!existingPiece || existingPiece === pieza) {
                // SI EL ESTA VACIO O SI LA PIEZA ES LA MISMA
                event.target.appendChild(pieza);

                // ------------- Revisión de si la pieza que se colocara tiene el mismo id que  el espacio  -------------
                if (piezaIndex === espacioIndex) {
                    // SI LA RESPUESTA ES CORRECTA
                    audio_correcto.play(); // play a la musica de correcto
                    pieza.setAttribute("draggable", "false"); // se le coloca en false el draggable para que ya no se mueva la pieza
                    pieza.style.pointerEvents = "none"; // se le quita el pointer para que no se pueda clikear
                    mostrarPregunta(piezaIndex); // se hace el cambio a la pregunta y a las segun el id de la pieza
                    //smostrarModal(); // se muestra el modal con los cambios de la pregunta y de las respuestas
                    setTimeout(() => {
                        audio_correcto.pause(); // pausar el audio
                        audio_correcto.currentTime = 0; // reiniciar el audio
                    }, 800); // tiempo de 8 segundos en del audio de correcto
                } else {
                    // SI LA RESPUESTA ES INCORRECTA
                    audio_incorrecto.play(); // play a la musica de incorrecto
                    setTimeout(() => {
                        audio_incorrecto.pause(); // pausar el audio
                        audio_incorrecto.currentTime = 0; // reiniciar el audio
                    }, 500); // tiempo de 5 segundo del audio incorrecto
                }
            } else {
                // SI EL ESPACIO ESTA LLENO O LA PIEZA NO ES LA MISMA
                let originalParent = document.getElementById(
                    pieza.getAttribute("data-original-parent")
                ); // Busca la posiscion inicial
                originalParent.appendChild(pieza); // Se manda a su posicion inicial
                pieza.style.position = "static"; // Se le deja estatico para que no se mueva
                pieza.style.transform = "none"; // Hace que la pieza permanezca sin otro movimiento
            }
        } else {
            let originalParent = document.getElementById(
                pieza.getAttribute("data-original-parent")
            );
            originalParent.appendChild(pieza);
            pieza.style.position = "static";
            pieza.style.transform = "none";
        }
    }

    // Eventos a los espacios para soporte de pc
    espacios.forEach((espacio) => {
        espacio.addEventListener("dragover", allowDrop, false);
        espacio.addEventListener("drop", drop, false);
    });
});

// -------------------------------- Logica para loch ( PC ) ------------------------------


// ---------------- Añadiendo rompecabezas -----------------------

/*let rompecabezas_random = [];

$.ajax({
    url: `https://junamnoj.foxint.tech/api/rompecabezas/1`,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (response.rompecabeza && response.rompecabeza.imagen) {


            // Selecciona una imagen aleatoria de la lista
            let escojer_imagen_rompecabezas = response.rompecabeza.imagen;
            // Selecciona todas las piezas
            const piezas = document.querySelectorAll(".pieza");

            // Aplica la misma imagen a todas las piezas
            piezas.forEach(function (pieza) {
                pieza.style.backgroundImage = `url("${escojer_imagen_rompecabezas}")`;
            });
        } else {
            console.error("No se encontraron rompecabezas en la respuesta.");
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud:", textStatus, errorThrown);
    },
});*/
let rompecabezas_random = [];

$.ajax({
    url: `https://junamnoj.foxint.tech/api/rompecabezas/`,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (response.rompecabezas && response.rompecabezas.length > 0) {
            // Almacena los rompecabezas en la lista
            rompecabezas_random = response.rompecabezas;

            // Selecciona un rompecabezas aleatorio
            let rompecabezas_aleatorio = rompecabezas_random[Math.floor(Math.random() * rompecabezas_random.length)];

            if (rompecabezas_aleatorio.imagen) {
                // Selecciona la imagen del rompecabezas aleatorio
                let escojer_imagen_rompecabezas = rompecabezas_aleatorio.imagen;

                // Selecciona todas las piezas
                const piezas = document.querySelectorAll(".pieza");

                // Aplica la misma imagen a todas las piezas
                piezas.forEach(function (pieza) {
                    pieza.style.backgroundImage = `url("${escojer_imagen_rompecabezas}")`;
                });
            } else {
                console.error("El rompecabezas seleccionado no tiene una imagen.");
            }
        } else {
            console.error("No se encontraron rompecabezas en la respuesta.");
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud:", textStatus, errorThrown);
    },
});


// ---------------- IMPLEMENTACION DEL BACKEND --------------------
let preguntas = [];
let preguntas_guardar = [];

$.ajax({
    url: `https://junamnoj.foxint.tech/api/preguntas_por_nivel/1`,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (response.data && response.data.length > 0) {
            response.data.forEach(function (pregunta) {
                let imagenes = [];
                let respuestas = [];
                $.ajax({
                    url: `https://junamnoj.foxint.tech/api/respuestas_por_pregunta/${pregunta.id}`,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function (respuesta) {
                                let img = respuesta.imagen;
                                let res = respuesta.texto_respuesta;

                                imagenes.push(img);
                                respuestas.push(res);
                            });
                        }
                    },
                });
                let preguntaDiccionario = {
                    id: pregunta.id,
                    pregunta: `¿${pregunta.texto_pregunta}?`,
                    images: imagenes,
                    respuestas: respuestas,
                    correcta: pregunta.texto_respuesta,
                };

                preguntas_guardar.push(preguntaDiccionario);
            });

            for (let i = 0; i < 6; i++) {
                let randomIndex = Math.floor(
                    Math.random() * preguntas_guardar.length
                );

                let seleccion = preguntas_guardar.splice(randomIndex, 1)[0];
                preguntas.push(seleccion);
            }
        } else {
            console.log("No hay preguntas disponibles para este nivel.");
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud:", textStatus, errorThrown);
    },
});

// ---------------- IMPLEMENTACION DEL BACKEND --------------------

// ----------- FUNCION PARA CARGAR LA BARRA --------------------
function cargar_barra(tamaño) {
    const barra = document.getElementById("barra");
    barra.value += tamaño;
}
// ----------- FUNCION PARA CARGAR LA BARRA --------------------

// -------- creacion de respuestas y html respuestas con pregunta --------
function mostrarContenidoPorId(id) {
    // Obtén el diccionario correspondiente al ID
    let preguntaDiccionario = preguntas[id - 1];

    if (!preguntaDiccionario) {
        console.error("No se encontró el diccionario para el ID:", id);
        return;
    }

    const contenedor = document.querySelector(".cont_imagenes_modal");

    // Limpia el contenedor antes de agregar nuevo contenido
    contenedor.innerHTML = "";
    let pregunta = preguntas[id - 1];
    preguntaTexto.innerText = pregunta.pregunta;

    // Genera el HTML basado en la cantidad de imágenes
    preguntaDiccionario.images.forEach((image, index) => {
        contenedor.innerHTML += `
            <div class="contenedor_de_preguntas_respuestas">
                <img src="${image}" class="respuesta" id="imagen${
            index + 1
        }" alt="Respuesta ${
            index + 1
        }" data-id="${index}" onclick="verificarRespuesta(${index}, ${id})">
                <p>${preguntaDiccionario.respuestas[index]}</p>
            </div>
        `;
    });
}

function verificarRespuesta(imagenIndex, preguntaId) {
    let preguntaDiccionario = preguntas[preguntaId - 1];
    let respuestaCorrecta = preguntaDiccionario.correcta;
    let tamaño_2 =  100 / 6;
    contador_nivel_1 ++;
    if (contador_nivel_1 === preguntas.length){
        nivel_completado_1 = 1;

        localStorage.setItem('nivel_completado_1', nivel_completado_1);
    }
    if (intentos_1 <= 3){
    sendDataToApi(
        userId,              // usuario_id
        preguntaDiccionario.id,              // pregunta_id
        nivel_completado_1,              // completado
        intentos_1,              // intentos
        16,            // puntuacion
        nivel_completado_1,              // estado_proceso
        respuestaCorrecta,      // texto_respuesta_preguntas
        preguntaDiccionario.respuestas[imagenIndex],      // texto_respuesta_respuestas
        1               // status
      );
      }
   /*if (preguntaDiccionario.respuestas[imagenIndex] === respuestaCorrecta) {
        //alert("¡Correcto!");
        // Aquí puedes añadir cualquier otra acción en caso de respuesta correcta
    } else {
        //alert(`Incorrecto. Intenta de nuevo. la respuesta era: ${respuestaCorrecta}`);
        // Aquí puedes añadir cualquier otra acción en caso de respuesta incorrecta
    }*/

    // Cierre del modal
    modal.classList.remove("modal_show");
    completadas++;
    localStorage.setItem("completadas", completadas);
    if (completadas >= 6) {
        completadas = 6;

        boton_continuar.style.display = "block";
        boton_regresar.style.display = "none";
    }
    if (completadas == 6) {
        confetti_++;
        espacio1.style.border = "none";
        espacio2.style.border = "none";
        espacio3.style.border = "none";
        espacio4.style.border = "none";
        espacio5.style.border = "none";
        espacio6.style.border = "none";
        rompecabezas.style.gap = "0px";
        aplausos.play();
        setTimeout(() => {
            aplausos.pause();
            aplausos.currentTime = 0;
        }, 15000);
    }

    if (confetti_ == 1) {
        launchConfetti();
    }
    let tamaño = 100 / preguntas.length;
    cargar_barra(tamaño);
    contador.innerText = `${completadas}/6`;
}

let confetti_ = 0;

var correctas = 0;
let completadas = 0;

let modal = document.getElementById("modal");
let span = document.getElementsByClassName("close")[0];
let preguntaTexto = document.getElementById("pregunta");
let imagenesRespuesta = document.querySelectorAll(".respuesta");
let contador = document.getElementById("contador");
const close_modal = document.querySelector(".close_modal");

const rompecabezas = document.querySelector(".rompecabezas_final");
const espacios = document.querySelector(".espacio");
const espacio1 = document.getElementById("espacio1");
const espacio2 = document.getElementById("espacio2");
const espacio3 = document.getElementById("espacio3");
const espacio4 = document.getElementById("espacio4");
const espacio5 = document.getElementById("espacio5");
const espacio6 = document.getElementById("espacio6");
const boton_continuar = document.getElementById("next-button");
const modal_continuar = document.getElementById("modal-continuar");
const contenedor_imagenes = document.getElementById(
    "contenedor_modal_imagenes"
);

boton_regresar.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.add("modal_show");
    contenedor_imagenes.style.display = "none";
    close_modal.style.display = "block";
    modal_continuar.style.display = "block";
    preguntaTexto.style.display = "none";
});

close_modal.style.display = "none";

close_modal.addEventListener("click", (e) => {
    e.preventDefault();
    close_modal.style.display = "none";
    modal.classList.remove("modal_show");
    setTimeout(() => {
        modal_continuar.style.display = "none";
        preguntaTexto.style.display = "block";
        contenedor_imagenes.style.display = "flex";
    }, 1000);
});

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

imagenesRespuesta.forEach((imagen, i) => {
    imagen.addEventListener("click", (e) => {
        e.preventDefault();
        let index = modal.getAttribute("data-index");
        let esCorrecta = imagen.getAttribute("data-correct") === "true"; // Aquí la validación de las respuestas si la necesitas
        document
            .querySelector(`.pieza[data-index="${index}"]`)
            .classList.add("completada");

        // Cierre del modal
        modal.classList.remove("modal_show");
        if (esCorrecta) {
            correctas++;
        }
        completadas++;
        localStorage.setItem("completadas", completadas);
        if (completadas >= 6) {
            completadas = 6;

            boton_continuar.style.display = "block";
            boton_regresar.style.display = "none";
        }
        if (completadas == 6) {
            confetti_++;
            espacio1.style.border = "none";
            espacio2.style.border = "none";
            espacio3.style.border = "none";
            espacio4.style.border = "none";
            espacio5.style.border = "none";
            espacio6.style.border = "none";
            rompecabezas.style.gap = "0px";
            aplausos.play();
            setTimeout(() => {
                aplausos.pause();
                aplausos.currentTime = 0;
            }, 15000);
        }

        if (confetti_ == 1) {
            launchConfetti();
        }
        contador.innerText = `${completadas}/6`;
        e.preventDefault();
        modal.classList.remove("modal_show");
        let tamaño = 100 / preguntas.length;
        cargar_barra(tamaño);
    });
});

function mostrarPregunta(index) {
    mostrarContenidoPorId(index);

    modal.classList.add("modal_show");
    modal.setAttribute("data-index", index);
}

modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        e.stopPropagation(); // Evita que el clic en el fondo cierre el modal
    }
});

// Evita que el modal se cierre al hacer clic en el contenido
modalContent.addEventListener("click", (e) => {
    e.stopPropagation(); // Evita que el clic en el contenido cierre el modal
});

function goHome() {
    musica.pause();
    musica.currentTime = 0;

    window.location.href = "/home";
}

//----------------------------------------Confetti------------------------------------------
function launchConfetti() {
    const duration = 15 * 1000; // Duración en milisegundos
    const animationEnd = Date.now() + duration;
    const defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

    function randomInRange(min, max) {
        return Math.random() * (max - min) + min;
    }

    const interval = setInterval(function () {
        const timeLeft = animationEnd - Date.now();
        if (timeLeft <= 0) {
            return clearInterval(interval);
        }
        const particleCount = 250 * (timeLeft / duration);
        // Lanzar confeti desde diferentes lugares
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
            })
        );
        confetti(
            Object.assign({}, defaults, {
                particleCount,
                origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
            })
        );
    }, 300);
}
