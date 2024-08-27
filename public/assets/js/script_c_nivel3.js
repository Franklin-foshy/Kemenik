let questions = [];

// Cargar las preguntas del API
$.ajax({
    url: `https://junamnoj.foxint.tech/api/preguntas_por_nivel/3`,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (response.data && response.data.length > 0) {
            let requests = response.data.map(function (pregunta) {
                return $.ajax({
                    url: `https://junamnoj.foxint.tech/api/respuestas_por_pregunta/${pregunta.id}`,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        if (response.data && response.data.length > 0) {
                            let imagene = [];
                            let respuestas = [];

                            response.data.forEach(function (respuesta) {
                                imagene.push(respuesta.imagen);
                                respuestas.push(respuesta.texto_respuesta);
                            });

                            let preguntaDiccionario = {
                                text: `¿${pregunta.texto_pregunta}?`,
                                images: imagene,
                                descrip: respuestas,
                                correct: pregunta.texto_respuesta,
                            };

                            questions.push(preguntaDiccionario);
                        }
                    },
                    error: function () {
                        console.error(
                            "Error al cargar las respuestas de la pregunta:",
                            pregunta.id
                        );
                    },
                });
            });

            // Esperar a que todas las solicitudes AJAX internas terminen
            $.when(...requests).then(function () {
                // Ahora que todas las preguntas y respuestas están cargadas, generar el HTML
                generateHTMLForCurrentQuestion();
            });
        } else {
            console.log("No hay preguntas disponibles para este nivel.");
        }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud:", textStatus, errorThrown);
    },
});

// ------------ crear epacios de respuestas --------------------

function generateHTMLForCurrentQuestion() {
    let preguntaSeleccionada = questions[currentQuestionIndex];

    const container = document.getElementById("image-container");

    preguntaSeleccionada.images.forEach((image, index) => {
        // Crear el contenedor principal
        const div = document.createElement("div");
        div.className = "imagenes-descrip";

        // Crear la imagen
        const img = document.createElement("img");
        img.src = preguntaSeleccionada.images[index]; // Aquí se usa el nombre de la imagen del diccionario
        img.alt = `Imagen ${index + 1}`;
        img.className = "image";
        img.setAttribute("onclick", `checkAnswer(${index})`); // Se usa el índice como identificador

        // Crear el párrafo con la descripción correspondiente
        const p = document.createElement("p");
        p.className = "descripccion";
        p.id = `descripcion${index + 1}`; // ID dinámico
        p.textContent = preguntaSeleccionada.descrip[index]; // Descripción correspondiente al índice

        // Añadir la imagen y el párrafo al div principal
        div.appendChild(img);
        div.appendChild(p);

        // Finalmente, agregar el div completo al contenedor principal
        container.appendChild(div);
    });
}

// Variables globales y elementos del DOM
var quiz3 = document.getElementById("quiz3");
var aplausos = document.getElementById("audio_correcto");
var audio_incorrecto = document.getElementById("audio_incorrecto");
var fuegos_artificiales = document.getElementById("fuegos_artificiales");

const body = document.getElementById("body-principal");
const cargando = document.getElementById("cargando");
const game_cont = document.getElementById("game-container");
const header = document.getElementById("header");
const barra = document.getElementById("barra_id");
const boton_continuar = document.getElementById("next-button");
const pregunta_gif = document.getElementById("gif-pregunta");
const open_modal = document.querySelector(".image");
const modal = document.querySelector(".modal");
const close_modal = document.querySelector(".close_modal");
const texto_modal = document.getElementById("texto_modal");
const in_co = document.getElementById("in_co");
const imagen_modal = document.getElementById("imagen_modal");
const cerrar_modal = document.getElementById("cerrar_modal");
const gif_pregunta = document.getElementById("gif-pregunta");
const text_nivel = document.getElementById("nivel");

close_modal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("modal_show");
});

cerrar_modal.addEventListener("click", (e) => {
    e.preventDefault();
    modal.classList.remove("modal_show");
});

let time_pantalla_carga;
let time_teminar;
time_pantalla_carga = setTimeout(function () {
    game_cont.style.display = "none";
});

time_teminar = setTimeout(function () {
    game_cont.style.display = "flex";
    boton_continuar.style.display = "block";
    barra.style.display = "block";
    header.style.display = "block";
    cargando.style.display = "none";
    gif_pregunta.style.display = "flex";
    text_nivel.style.display = "block";
    tamaño = 100 / questions.length;
    quiz3.play();
}, 5000);

function cargar_barra() {
    const barra = document.getElementById("barra");
    barra.value += tamaño;
}
let currentQuestionIndex = 0;
var correct3 = 0;

function loadQuestion() {
    const question = questions[currentQuestionIndex];
    document.getElementById("question-clan").textContent = question.text;

    const images = document.querySelectorAll(".image");

    images.forEach((img) => {
        img.classList.remove("correct", "incorrect");
        img.onclick = () => checkAnswer(Array.from(images).indexOf(img));
        aplausos.pause();
        aplausos.currentTime = 0;
        audio_incorrecto.pause();
        audio_incorrecto.currentTime = 0;
    });

    document.getElementById("feedback").textContent = "";
    document.getElementById("next-button").style.pointerEvents = "none";
}

function checkAnswer(selectedIndex) {
    const question = questions[currentQuestionIndex];
    const images = document.querySelectorAll(".image");
    const img_correcta = question.descrip[selectedIndex];
    const correctIndex = question.descrip.indexOf(question.correct);

    if (img_correcta === question.correct) {
        images[selectedIndex].classList.add("correct");
        document.getElementById("feedback").textContent = "Correcto";
        document.getElementById("feedback").style.color = "#28a745";
        correct3++;
        launchConfetti();
        modal.classList.add("modal_show");
        in_co.textContent = "Correcto";
        in_co.style.color = "#28a745";
        imagen_modal.src = question.images[correctIndex];
        texto_modal.textContent = question.descrip[correctIndex];
        aplausos.play();
    } else {
        images[selectedIndex].classList.add("incorrect");
        document.getElementById("feedback").textContent = "Incorrecto";
        document.getElementById("feedback").style.color = "red";
        modal.classList.add("modal_show");
        in_co.textContent = "Incorrecto";
        in_co.style.color = "red";
        imagen_modal.src = question.images[correctIndex];
        texto_modal.textContent =
            "La respuesta era: " + question.descrip[correctIndex];
        audio_incorrecto.play();
    }

    document.getElementById("next-button").style.pointerEvents = "auto";
    images.forEach((img) => (img.onclick = null)); // Desactivar clics después de una selección
}

function launchConfetti() {
    const duration = 4 * 1000; // Duración en milisegundos
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

boton_continuar.addEventListener("click", nextQuestion);

function nextQuestion() {
    currentQuestionIndex++;
    localStorage.setItem("correct3", correct3);
    cargar_barra();
    if (currentQuestionIndex < questions.length) {
        // Limpiar el contenedor antes de cargar la nueva pregunta
        document.getElementById("image-container").innerHTML = "";
        generateHTMLForCurrentQuestion(); // Genera el nuevo contenido
        loadQuestion(); // Carga los datos en el HTML generado
    } else {
        showResult();
    }
}

function showResult() {
    document.getElementById("game").style.display = "block";
    document.getElementById("result").style.display = "block";
    document.getElementById("next-button").style.display = "none";
    document.getElementById("image-container").style.display = "none";
    document.getElementById("feedback").style.display = "none";
    document.getElementById("question-clan").textContent =
        "GRACIAS POR LLEGAR AL FINAL !";
    game_cont.style.justifyItems = "center";
    document.getElementById(
        "result-text"
    ).textContent = `REPUESTAS CORRECTAS ${correct3} DE ${questions.length}`;
    document.getElementById("home-button").style.display = "block";
    launchConfetti();
    fuegos_artificiales.play();
}

function goHome() {
    window.location.href = "/home";
    quiz3.pause();
    fuegos_artificiales.pause();
}

// Iniciar la primera pregunta
setTimeout(function () {
    loadQuestion();
}, 5000);
