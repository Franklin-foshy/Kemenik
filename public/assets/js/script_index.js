


let mostrar_enlace = localStorage.getItem('mostrar_enlace');
if (mostrar_enlace === null) {
    mostrar_enlace = 0;
} else {
    mostrar_enlace = parseInt(mostrar_enlace, 10); 
}



        // Obtener elementos del DOM
        var enlaceMContenedor = document.getElementById("enlaceMContenedor");
        var cerrarEnlaceMSpan = document.getElementsByClassName("cerrar")[0];
        var copiarEnlaceMBtn = document.getElementById("copiarEnlaceMBtn");
        var enlaceACopiar = document.getElementById("enlaceACopiar").textContent;

        // Abrir el enlace_m al hacer clic en el botón
        function abrir_enlace() {
            enlaceMContenedor.style.display = "flex";
        }

        // Cerrar el enlace_m al hacer clic en la 'x'
        cerrarEnlaceMSpan.onclick = function() {
            enlaceMContenedor.style.display = "none";
        }

        // Cerrar el enlace_m al hacer clic fuera del contenido
        window.onclick = function(event) {
            if (event.target == enlaceMContenedor) {
                enlaceMContenedor.style.display = "none";
            }
        }

        // Copiar el enlace al portapapeles
        copiarEnlaceMBtn.onclick = function() {
            var elementoTemporal = document.createElement("textarea");
            elementoTemporal.value = enlaceACopiar;
            document.body.appendChild(elementoTemporal);
            elementoTemporal.select();
            document.execCommand("copy");
            document.body.removeChild(elementoTemporal);

            alert("Enlace copiado: " + enlaceACopiar);
        }

if (mostrar_enlace === 1){
    abrir_enlace()
    mostrar_enlace = 2
    localStorage.setItem('mostrar_enlace', mostrar_enlace);
}


document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const cerrarModal = document.getElementById('close-modal');
    cerrarModal.addEventListener('click', (e) => {
        e.preventDefault(); 
        modal.classList.add('modal-visible');
    });
});


document.addEventListener('DOMContentLoaded', function() {
    if (typeof window.userId !== 'undefined') {
      console.log('User ID desde script_index.js:', window.userId);
      localStorage.setItem('userId', window.userId); 
    } else {
      console.error('User ID no definido');
    }
  });




document.addEventListener('DOMContentLoaded', function() {
    const nivel4Button = document.getElementById('nivel2');
    const nivel3button = document.getElementById('nivel3');
    let completadas_nivel2 = localStorage.getItem('nivel_completado_2');

    let completadas = localStorage.getItem('nivel_completado_1');
    if (completadas === null) {
        completadas = 0;
    } else {
        completadas = parseInt(completadas, 10); 
    }

    if (completadas_nivel2 === null) {
        completadas_nivel2 = 0;
    } else {
        completadas_nivel2 = parseInt(completadas_nivel2, 10); 
    }


    // Función para actualizar la accesibilidad del botón Nivel 2
    function updateCorrectAnswers(count) {
        if (count === 1) { // Número mínimo de respuestas correctas para desbloquear Nivel 2
            nivel4Button.style.pointerEvents = 'auto';
            
            nivel4Button.style.opacity = 1; // Opcional: hacer que el botón se vea activo
        } else {
            nivel4Button.style.pointerEvents = 'none';
            nivel4Button.style.opacity = 0.5; // Opcional: hacer que el botón se vea desactivado
        }
    };

    // Función para actualizar la accesibilidad del botón Nivel 3
    function updatecoerrec2(count) {
        let contador = count ;
        if (contador === 1) {
            nivel3button.style.pointerEvents = 'auto'; 
        } else {
            nivel3button.style.pointerEvents = 'none';
            nivel3button.style.opacity = 0.5; 
        };
    };

    // Función para actualizar la accesibilidad del botón Nivel
    /*function updatecoerrec2(count) {
        let contador = count ;
        // Habilitar el botón de Nivel 3 si se cumplen las condiciones
        if (contador >= 3) {
            nivel3button.href = 'c_nivel2.html'; // Cambiar a la URL correcta si es necesario
            nivel3button.style.pointerEvents = 'auto'; // Habilitar clics
            nivel3button.style.color = '#000'; // Restaurar color de texto
        } else {
            nivel3button.href = 'index.html';
            nivel3button.style.pointerEvents = 'none'; // Deshabilitar clics
            nivel3button.style.color = 'gray'; // Estilo de botón deshabilitado
        };
    };*/


    // Llamar a la función para actualizar el botón Nivel 2 al cargar la página

    updateCorrectAnswers(completadas);
    
    
    // Llamar a la función para actualizar el botón Nivel 3 al cargar la página
    updatecoerrec2(completadas_nivel2);
    

});




