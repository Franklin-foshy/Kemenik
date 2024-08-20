
/*
let questions = [];

$.ajax({
    url: `http://127.0.0.1:8000/api/preguntas_por_nivel/1`,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        console.log('Preguntas recibidas:', response.data); // Log para verificar las preguntas recibidas

        if (response.data && response.data.length > 0) {
            let promises = response.data.map(function(pregunta) {
                return new Promise(function(resolve) {
                    $.ajax({
                        url: `http://127.0.0.1:8000/api/respuestas_por_pregunta/${pregunta.id}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log(`Respuestas para pregunta ${pregunta.id}:`, response.data); // Log para verificar las respuestas recibidas

                            if (response.data && response.data.length > 0) {
                                let imagene = [];
                                let respuestas = [];
                                response.data.forEach(function(respuesta) {
                                    imagene.push(respuesta.imagen);
                                    respuestas.push(respuesta.texto_respuesta);
                                });

                                let preguntaDiccionario = {
                                    text: `¿${pregunta.texto_pregunta}?`,
                                    images: imagene,
                                    descrip: respuestas,
                                    correct: pregunta.texto_respuesta_correcta
                                };

                                questions.push(preguntaDiccionario);
                                console.log('Pregunta añadida:', preguntaDiccionario); // Log para verificar la pregunta añadida
                            }
                            resolve();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error(`Error en la solicitud de respuestas para pregunta ${pregunta.id}:`, textStatus, errorThrown);
                            resolve();
                        }
                    });
                });
            });

            // Esperar a que todas las solicitudes internas se completen
            Promise.all(promises).then(function() {
                console.log('Todas las preguntas cargadas:', questions); // Log para verificar el resultado final
                // Aquí puedes continuar con el resto de la lógica que depende de las preguntas
            });
        } else {
            console.log('No hay preguntas disponibles para este nivel.');
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud de preguntas:', textStatus, errorThrown);
    }
});*/
let questions = [];

// Cargar las preguntas del API
$.ajax({
    url: `http://127.0.0.1:8000/api/preguntas_por_nivel/2`,
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        if (response.data && response.data.length > 0) {
            response.data.forEach(function(pregunta) {
                let imagene = [];
                let respuestas = [];

                // Cargar las respuestas correspondientes a la pregunta
                $.ajax({
                    url: `http://127.0.0.1:8000/api/respuestas_por_pregunta/${pregunta.id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.data && response.data.length > 0) {
                            response.data.forEach(function(respuesta) {
                                let imgs = respuesta.imagen;
                                let res = respuesta.texto_respuesta;

                                imagene.push(imgs);
                                respuestas.push(res);
                            });

                            let preguntaDiccionario = {
                                text: `¿${pregunta.texto_pregunta}?`,
                                images: imagene,
                                descrip: respuestas,
                                correct: pregunta.texto_respuesta
                            };

                            questions.push(preguntaDiccionario);
                        }
                    },
                    error: function() {
                        console.error('Error al cargar las respuestas de la pregunta:', pregunta.id);
                    }
                });
            });
        } else {
            console.log('No hay preguntas disponibles para este nivel.');
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud:', textStatus, errorThrown);
    }
});

// Variables globales y elementos del DOM
var quiz3 = document.getElementById('quiz3');
var aplausos = document.getElementById('audio_correcto');
var audio_incorrecto = document.getElementById('audio_incorrecto');
var fuegos_artificiales = document.getElementById('fuegos_artificiales');

const body = document.getElementById('body-principal');
const cargando = document.getElementById('cargando');
const game_cont = document.getElementById('game-container');
const header = document.getElementById('header');
const barra = document.getElementById('barra_id');
const boton_continuar = document.getElementById('next-button');
const pregunta_gif = document.getElementById('gif-pregunta');
const open_modal = document.querySelector('.image')
const modal = document.querySelector('.modal')
const close_modal = document.querySelector('.close_modal')
const texto_modal = document.getElementById('texto_modal');
const in_co = document.getElementById('in_co');
const imagen_modal = document.getElementById('imagen_modal');
const cerrar_modal = document.getElementById('cerrar_modal');
const gif_pregunta = document.getElementById('gif-pregunta');
const text_nivel = document.getElementById('nivel');

close_modal.addEventListener('click', (e)=> {
    e.preventDefault();
    modal.classList.remove('modal_show');
});

cerrar_modal.addEventListener('click', (e)=> {
    e.preventDefault();
    modal.classList.remove('modal_show');
});

let time_pantalla_carga;
let time_teminar;
time_pantalla_carga = setTimeout(function(){
    game_cont.style.display = 'none';
},);

time_teminar = setTimeout(function(){
    game_cont.style.display = 'flex';
    boton_continuar.style.display = 'block';
    barra.style.display = 'block';
    header.style.display = 'block';
    cargando.style.display = 'none';
    gif_pregunta.style.display = 'flex';
    text_nivel.style.display = 'block';
    tamaño = 100/questions.length;
    quiz3.play();
}, 5000);



function cargar_barra (){
    const barra = document.getElementById('barra');
    barra.value += tamaño;
}
let currentQuestionIndex = 0;
var correct3 = 0;

function loadQuestion() {
    const question = questions[currentQuestionIndex];
    document.getElementById('question-clan').textContent = question.text;
    document.getElementById('descripcion1').textContent = question.descrip[0];
    document.getElementById('descripcion2').textContent = question.descrip[1];
    document.getElementById('descripcion3').textContent = question.descrip[2];

    const images = document.querySelectorAll('.image');
    images[0].src = question.images[0];
    images[1].src = question.images[1];
    images[2].src = question.images[2];

    images.forEach(img => {
        img.classList.remove('correct', 'incorrect');
        img.onclick = () => checkAnswer(Array.from(images).indexOf(img));
        aplausos.pause();
        aplausos.currentTime = 0;
        audio_incorrecto.pause();
        audio_incorrecto.currentTime = 0;
    });

    document.getElementById('feedback').textContent = '';
    document.getElementById('next-button').style.pointerEvents = 'none';
}

function checkAnswer(selectedIndex) {
    const question = questions[currentQuestionIndex];
    const images = document.querySelectorAll('.image');
    const img_correcta = question.descrip[selectedIndex];
    const correctIndex = question.descrip.indexOf(question.correct);

    if (img_correcta === question.correct) {
        images[selectedIndex].classList.add('correct');
        document.getElementById('feedback').textContent = 'Correcto';
        document.getElementById('feedback').style.color = '#28a745';
        correct3++;
        launchConfetti();
        modal.classList.add('modal_show');
        in_co.textContent = 'Correcto';
        in_co.style.color = '#28a745';
        imagen_modal.src = question.images[correctIndex];
        texto_modal.textContent = question.descrip[correctIndex];
        aplausos.play();
    } else {
        images[selectedIndex].classList.add('incorrect');
        document.getElementById('feedback').textContent = 'Incorrecto';
        document.getElementById('feedback').style.color = 'red';
        modal.classList.add('modal_show');
        in_co.textContent = 'Incorrecto';
        in_co.style.color = 'red';
        imagen_modal.src = question.images[correctIndex];
        texto_modal.textContent = "La respuesta era: " + question.descrip[correctIndex];
        audio_incorrecto.play();
    }

    document.getElementById('next-button').style.pointerEvents = 'auto';
    images.forEach(img => img.onclick = null); // Desactivar clics después de una selección
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

    
boton_continuar.addEventListener('click', nextQuestion);


function nextQuestion() {
    currentQuestionIndex++;
    // aquí guardo la variable para poder mandársela al archivo de script_index.html
    localStorage.setItem('correct3', correct3);
    cargar_barra();
    if (currentQuestionIndex < questions.length) {
        loadQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    document.getElementById('game').style.display = 'block';
    document.getElementById('result').style.display = 'block';
    document.getElementById('next-button').style.display = 'none';
    document.getElementById('image-container').style.display = 'none';
    document.getElementById('feedback').style.display = 'none';
    document.getElementById('question-clan').textContent = 'GRACIAS POR LLEGAR AL FINAL !';
    game_cont.style.justifyItems = 'center';
    document.getElementById('result-text').textContent = `REPUESTAS CORRECTAS ${correct3} DE ${questions.length}`;
    document.getElementById('home-button').style.display = 'block';
    launchConfetti();
    fuegos_artificiales.play();
}

function goHome() {
    window.location.href = 'home';
    quiz3.pause();
    fuegos_artificiales.pause();
}

// Iniciar la primera pregunta
setTimeout(function(){
    loadQuestion();
}, 5000);






