<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel2.css')}}">
    <title>{{_('Nivel 2')}}</title>
</head>
<body>

<audio id="audio_correcto" src="{{ asset('music/correcto.mp3')}}"></audio>
<audio id="audio_incorrecto" src="{{ asset('music/incorrecto.mp3')}}"></audio>
<audio id="aplausos" src="{{ asset('music/aplausos.mp3')}}"></audio>


@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.modal_niveles_escenas')



<!-------------------------------------- pantalla de carga --------------------------------------------->

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.pantalla_carga')

<!-------------------------------------- pantalla de carga --------------------------------------------->
<!-------------------------------------- modal --------------------------------------------->

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.modal')

<!-------------------------------------- modal --------------------------------------------->

<!---------------------- header ------------------------>

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.header')

<!---------------------- header ------------------------>

<!---------------------- barra preogreso ------------------------>

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.barra_progreso')

<!---------------------- barra preogreso ------------------------>


<!---------------------- vidas ------------------------>

<div id="vidas" style="display: none">
    <span class="vida"></span>
</div>

<!---------------------- vidas ------------------------>

<!------------------------------ marco historia ------------------------------------>

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.marco_historia')

<!------------------------------ marco historia ------------------------------------>

<!-------------------------------------- Boton salir --------------------------------------------->

<button class = "continuar" id="regresar"  href="{{ route('misniveles')}}" style="display:none;" onclick="goHome()">{{_('Regresar')}}</button>
<button class = "continuar" id="siguiente_escena" style="display:none;">{{_('Siguiente')}}</button>
<!-------------------------------------- Boton salir --------------------------------------------->


    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

            var fondo_campo_E4 = "{{ asset('imgs/nivel2/E4/BACKGROUND_04_02.png') }}";

            var imagenes_fondo = [
            "{{ asset('imgs/nivel2/E1/BACKGROUND-E1.png') }}",
            "{{ asset('imgs/nivel2/E2/BACKGROUND_E2_1.png') }}",
            "{{ asset('imgs/nivel2/E3/BACKGROUND_03.png') }}",
            "{{ asset('imgs/nivel2/E4/BACKGROUND_04.png') }}", 
            "{{ asset('imgs/nivel2/E5/BACKGROUND_05.png') }}", 
        ];

</script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>

    <script src="{{ asset('assets/js/historia_nivel2.js')}}"></script>
</body>

</html>


