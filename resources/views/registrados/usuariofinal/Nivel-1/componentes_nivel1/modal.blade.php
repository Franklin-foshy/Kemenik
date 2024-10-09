<!-------------------------------------- modal --------------------------------------------->

<section class="modal" id="modal">
    <div class="modal_cont">
        <span class="close" style="display: none">&times;</span>
        <h2 id="pregunta">{{_('')}}</h2>
        <div class="cont_imagenes_modal" id="contenedor_modal_imagenes">
        </div>
        <div class="modal-continuar" id="modal-continuar" style="display: none">
            {{_('PARA SEGUIR AVANZANDO PRIMERO TIENES QUE ARMAR EL ROMPECABEZAS Y RESPONDER TODAS LAS PREGUNTAS.')}}
        </div> 
        <div class="close_modal">{{_('x')}}</div>
    </div>
    <div class="gif_preguntas">
        <img src="{{ asset('imgs/nivel1/JUANJPU_FRONTAL_MEDIO_PLANO_E2.png')}}" alt="">
    </div>
</section>

<!-------------------------------------- modal --------------------------------------------->
