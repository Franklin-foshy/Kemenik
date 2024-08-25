<!-------------------------------------- modal --------------------------------------------->


<section class="custom-modal" id="modal" >
    <div class="custom-modal-content">
        <div class="image-container">
            <div class="modal-text" id="modal-text">
                {{ __('Hola Bienvenido ') . \Auth::user()->name}}
            </div>
            <div class="modal-text" id="modal-text">
                {{ __('Hoy aprenderas sobre la correspondabilidad')}}
            </div>
            <div class="contenedor-imagen">
                <img src="{{ asset('imgs/index/JUNAM_FRONTAL_MEDIO_PLANO_E3.png') }}" class="respuesta" id="imagen1" >
            </div>
            
        </div>
        <div class="imagen-contenet-modal-dashboard">
            <img src="{{ asset('imgs/index/JUNAJPU_HABLANDO_E1.gif') }}" class="respuesta" id="imagen1" >
        </div>
        <a href="#" id="close-modal" class="button-contact">
            {{_('Continuar')}}
        </a>
    </div>
</section>


<!-------------------------------------- modal --------------------------------------------->