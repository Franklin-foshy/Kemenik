<!-------------------------------------- modal --------------------------------------------->


<section class="custom-modal" id="modal">
    <div class="custom-modal-content">
        <div class="image-container">
            <div class="modal-text" id="modal-text">
                {{_('Que mal, has perdido todas tus vidas, regresaras hasta la primer escena pero no pierdas los animos, SIGUE INTENTANDO!!!')}}
            </div>
            <div class="contenedor-imagen">
                    
            </div>
            
        </div>.
        <img src="{{ asset('imgs/index/JUNAJPU_HABLANDO_E1.gif') }}" class="respuesta" id="imagen1">
        <a href="#" id="close-modal" class="button-contact">
            {{_('Continuar')}}
        </a>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const cerrarModal = document.getElementById('close-modal');
    
    cerrarModal.addEventListener('click', (e) => {
        e.preventDefault(); 
        modal.classList.add('modal-visible');
    });
});
</script>


<!-------------------------------------- modal --------------------------------------------->