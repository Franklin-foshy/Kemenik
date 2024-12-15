<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel2.css')}}">
    <title>{{_('Nivel 2')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<audio id="audio_correcto" src="{{ asset('music/correcto.mp3')}}"></audio>
<audio id="audio_incorrecto" src="{{ asset('music/incorrecto.mp3')}}"></audio>
<audio id="aplausos" src="{{ asset('music/aplausos.mp3')}}"></audio>
<audio id="nivel2" src="{{ asset('music/nivel_2.mp3')}}"></audio>


@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.modal_instrucciones')



@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.modal_niveles_escenas')



<!-------------------------------------- pantalla de carga --------------------------------------------->

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.pantalla_carga')
</div>
<!-------------------------------------- pantalla de carga --------------------------------------------->
<!-------------------------------------- modal --------------------------------------------->

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.modal')

<!-------------------------------------- modal --------------------------------------------->

<!---------------------- header ------------------------>

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.header')

<!---------------------- header ------------------------>

<!---------------------- barra preogreso ------------------------>
<div class="container container-progress-bar col-12 col-xl-8 mt-5 mt-xl-0">
@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.barra_progreso')
</div>
<!---------------------- barra preogreso ------------------------>


<!---------------------- vidas ------------------------>
<div class="container-control-cuadro-vidas">
    <div id="vidas" style="display: none" class="vidas-movil col-12 col-xl-8 container vidas">
        <span class="vida"></span>
    </div>
        
    <!---------------------- vidas ------------------------>

    <!------------------------------ marco historia ------------------------------------>
    <div class="container-vidas-pc">
        @include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.marco_historia')

        <!------------------------------ marco historia ------------------------------------>
        
        <div id="vidas-2" style="display: none" class="vidas vidas-2">
            <span class="vida">❤️</span>
        </div>
    </div>


</div>



<!-------------------------------------- Boton salir --------------------------------------------->

<button class = "continuar" id="regresar"  href="{{ route('misniveles')}}" style="display:none;" onclick="goHome()">{{_('Regresar')}}</button>
<button class = "continuar" id="siguiente_escena" style="display:none;">{{_('Siguiente')}}</button>
<!-------------------------------------- Boton salir --------------------------------------------->


    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

            var fondo_campo_E4 = "{{ asset('imgs/nivel2/E4/BACKGROUND_04_02.png') }}";

            var fondo_cama_E7 = "{{ asset('imgs/nivel2/E7/BACKGROUND_E7_2.png') }}";

            var imagenes_fondo = [
            "{{ asset('imgs/nivel2/E1/BACKGROUND-E1.png') }}",
            "{{ asset('imgs/nivel2/E2/BACKGROUND_E2_1.png') }}",
            "{{ asset('imgs/nivel2/E3/BACKGROUND_03.png') }}",
            "{{ asset('imgs/nivel2/E4/BACKGROUND_04.png') }}", 
            "{{ asset('imgs/nivel2/E5/BACKGROUND_05.png') }}", 
            "{{ asset('imgs/nivel2/E6/BACKGROUND_06.png') }}", 
            "{{ asset('imgs/nivel2/E7/BACKGROUND_E7_1.png') }}", 
            "{{ asset('imgs/nivel2/E8/BACKGROUND_08.png') }}", 
        ];



</script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
<script>
    var listaImagenes2 = [
    "{{ asset('imgs/nivel2/nivel_2_1.jpeg') }}",
    "{{ asset('imgs/nivel2/nivel_2_2.jpeg') }}",
    "{{ asset('imgs/nivel2/nivel_2_3.jpeg') }}",
    "{{ asset('imgs/nivel2/nivel_2_4.jpeg') }}"];
</script>
    <script src="{{ asset('assets/js/historia_nivel2.js')}}"></script>
</body>

</html>


