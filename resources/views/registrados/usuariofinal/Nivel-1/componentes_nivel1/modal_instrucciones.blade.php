


<div id="desplegableInstrucciones" class="desplegable">
    <div class="contenido-desplegable" id="modal_contenidoo">
        <div class="encabezado-desplegable">
            <h5 class="titulo-desplegable">Instrucciones del Nivel 1</h5>
            <button type="button" class="cerrar" aria-label="Close" onclick="cerrarDesplegable()" style="display: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="cuerpo-desplegable">
            <img src="{{asset('')}}" alt="Imagen del Juego" class="imagen-desplegable" id="imagenInstruccion">
            <p class="texto-instrucciones" id="textoInstruccion"></p>
        </div>
        <div class="pie-desplegable">
            <button id="botonSiguienteInstruccion" class="boton-cerrar" onclick="cambiarImagen()">¡Entendido!</button>
            <button id="botonVamos" class="boton-cerrar" onclick="cerrarDesplegable()" style="display: none;">¡Vamos!</button>
        </div>
    </div>
</div>



