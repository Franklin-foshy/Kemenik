


// consultas de los niveles bloqueo 



document.addEventListener('DOMContentLoaded', function() {
    const nivel4Button = document.getElementById('nivel2');
    const nivel3button = document.getElementById('nivel3');

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






// consultas de los niveles bloqueo 
let apiUrl = `https://junamnoj.foxint.tech/api/progreso-dos-usuario/${window.userId}`;
let estado_nivel2 = 0 ; 
getLastEstadoProceso(apiUrl)
.then(estadoProceso => {
    console.log(estadoProceso)

    estado_nivel2 = estadoProceso ;
    updatecoerrec2(estado_nivel2);

})
    .catch(error => {
        estado_nivel2 = 0 ;
        console.error('Error:', error);
    });

let apiUrl1 = `https://junamnoj.foxint.tech/api/progreso-usuario/${window.userId}`;
let estado_nivel1 = 0 ; 
    getLastEstadoProceso(apiUrl1)
    .then(estadoProceso1 => {
        estado_nivel1 = estadoProceso1 ;
    console.log(estado_nivel1)
    updateCorrectAnswers(estado_nivel1);
    
})
    .catch(error => {
        estado_nivel1 = 0 ;
        console.error('Error:', error);
    });
    
    

    // Llamar a la función para actualizar el botón Nivel 2 al cargar la página

    
    
    
    // Llamar a la función para actualizar el botón Nivel 3 al cargar la página
    
    

});














/* recojer el proceso de cada nivel */
function getLastEstadoProceso(url) {
    return new Promise((resolve, reject) => {
        // Realizar la solicitud GET
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response && response.data && Array.isArray(response.data) && response.data.length > 0) {
                    // Obtener el último registro del array
                    let lastRecord = response.data[response.data.length - 1];
                    // Devolver el valor de "estado_proceso"
                    resolve(lastRecord.completado);
                } else {
                    resolve(0);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                resolve(0);
            }
        });
    });
}



/* recojer el proceso de cada nivel */

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


// ---------------------- recuperar el id -------------------







