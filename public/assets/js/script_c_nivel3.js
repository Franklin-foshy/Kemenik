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
    e.preventDefault()
    modal.classList.remove('modal_show')
} );


cerrar_modal.addEventListener('click', (e)=> {
    e.preventDefault()
    modal.classList.remove('modal_show')
} );

let time_pantalla_carga;
let time_teminar;
time_pantalla_carga = setTimeout(function(){
    game_cont.style.display = 'none';
},);

time_teminar = setTimeout(function(){
var quiz3 = document.getElementById('quiz3');

    game_cont.style.display = 'flex';
    boton_continuar.style = 'block'
    barra.style = 'block'
    header.style = 'block'
    cargando.style.display = 'none';
    gif_pregunta.style.display = 'flex';
    text_nivel.style.display = 'block';
    
    quiz3.play();
},1000)

const questions = [
    {
        text: "¿Quien crees que deberia encargasrse de los deberes del hogar?",
        images: ["imgs/nivel2/imagen_4.jpeg", "imgs/nivel2/imagen_1.jpeg","imgs/nivel2/imagen_2.jpeg"],
        descrip:["corresponsabilidad afectiva","señores en union","marchas en casa arraigadas a un espacio "],
        correct: 'corresponsabilidad afectiva'
    },
    {
        text: "Pregunta 2: ¿Cuál es la imagen correcta?",
        images: ["imgs/nivel2/imagen_2.jpeg", "imgs/nivel2/imagen_6.jpeg","imgs/nivel2/imagen_5.jpeg"],
        descrip:["ayuda en la limpieza","estutas socio economico","señores unidos por un mismo proposito"],
        correct: 'ayuda en la limpieza'
    },
    {
        text: "Pregunta 3: ¿Cuál es la imagen correcta?",
        images: ["imgs/nivel2/imagen_4.jpeg", "imgs/nivel2/imagen_2.jpeg","imgs/nivel2/imagen_3.jpeg"],
        descrip:["dilectivo progenero","segramentaria de aprencio a los impuestos ","mujeres unidas"],
        correct: 'mujeres unidas'
    },
    {
        text: "Pregunta 4: ¿Cuál es la imagen correcta?",
        images: ["imgs/nivel2/imagen_4.jpeg", "imgs/nivel2/imagen_1.jpeg","imgs/nivel2/imagen_2.jpeg"],
        descrip:["estatus en sociedad","marchas a favor de la igualdad","estatus cultural"],
        correct: 'marchas a favor de la igualdad'
    },
    {
        text: "Pregunta 5: ¿Cuál es la imagen correcta?",
        images: ["imgs/nivel2/imagen_5.jpeg", "imgs/nivel2/imagen_1.jpeg","imgs/nivel2/imagen_3.jpeg"],
        descrip:["corresponsabilidad en casa","no solo es mujer","todos juntos en casa"],
        correct: 'todos juntos en casa'
    }
];

let tamaño = 100/questions.length;

function cargar_barra (){
    const barra = document.getElementById('barra');
    barra.value += tamaño;
}
let currentQuestionIndex = 0;
var correct3 = 0;

function loadQuestion() {
    const question = questions[currentQuestionIndex];
    document.getElementById('question-clan').textContent = question.text;
    document.getElementById('descripcion1').textContent = question.descrip[0]
    document.getElementById('descripcion2').textContent = question.descrip[1]
    document.getElementById('descripcion3').textContent = question.descrip[2]
    const images = document.querySelectorAll('.image');
    images[0].src = question.images[0];
    images[1].src = question.images[1];
    images[2].src = question.images[2];
    images.forEach(img => {
        img.classList.remove('correct', 'incorrect');
        img.onclick = () => checkAnswer(Array.from(images).indexOf(img));
        aplausos.pause();
        aplausos.currentTime = 0 ;
        audio_incorrecto.pause();
        audio_incorrecto.currentTime = 0 ;

    });
    document.getElementById('feedback').textContent = '';
    document.getElementById('next-button').style.pointerEvents = 'none';




}

let time;
clearTimeout(time);
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

function nextQuestion() {
    currentQuestionIndex++;
    // aquí guardo la variable para poder mandársela al archivo de script_index.html
    localStorage.setItem('correct3', correct3);
    cargar_barra()
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
    window.location.href = 'dashboard';
    quiz3.pause();
    fuegos_artificiales.pause();


}

// Iniciar la primera pregunta
loadQuestion();






