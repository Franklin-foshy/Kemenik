<!-------------------------------------- modal --------------------------------------------->

<!--
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
-->
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="modal-icon">
          <img src="{{ asset('imgs/index/niña_hola.gif') }}" class="respuesta" id="imagen1">
        </div>
        <h3 class="title">{{ __('Hola Bienvenido ') . \Auth::user()->name}}</h3>
        <p class="description">Aprende en JunamNoj'</p>
        <button class="btn" id="closeModalButton">¡Ve y aprende!</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('closeModalButton').addEventListener('click', function() {
    $('#welcomeModal').modal('hide');
  });

  $(document).ready(function () {
    // Muestra el modal al cargar la página
    $("#welcomeModal").modal("show");
  });
</script>
<!-------------------------------------- modal --------------------------------------------->