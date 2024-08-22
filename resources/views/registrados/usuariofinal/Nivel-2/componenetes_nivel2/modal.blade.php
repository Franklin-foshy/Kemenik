<!-------------------------------------- modal --------------------------------------------->


<section class="modal" id="modal">
    <div class="modal_cont">
        <span class="close" style="display:none">&times;</span>
        <h2 id="pregunta">{{_('')}}</h2>
        <div class="cont_imagenes_modal">
            <img src="{{ asset('imgs/nivel2/mujer_indumentaria.png') }}" class="respuesta" id="imagen1" alt="Respuesta 1">
            <div class="modal-continuar" id="modal-continuar" style="display:bock">
                {{_('Que mal, has perdido todas tus vidas, regresaras hasta la primer escena pero no pierdas los animos, SIGUE INTENTANDO!!!')}}
            </div>
        </div>
        <a href="" id="cerrar_modal"  class="contacto">
            {{_('Continuar')}}
        </a>
    </div>

</section>

<!-------------------------------------- modal --------------------------------------------->