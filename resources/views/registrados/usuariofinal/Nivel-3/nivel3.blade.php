<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{_('nivel 3')}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel3.css')}}">
</head>
<body class="body-nivel2" id="body-principal">

<audio id="audio_correcto" src="{{ asset('music/correcto.mp3')}}"></audio>
<audio id="audio_incorrecto" src="{{ asset('music/incorrecto.mp3')}}"></audio>
<audio id="aplausos" src="{{ asset('music/aplausos.mp3')}}"></audio>
<audio  id="quiz3" src="{{ asset('music/sonido_quiz3.mp3')}}"></audio>
<audio  id="fuegos_artificiales" src="{{ asset('music/fuegos_artificiales.mp3')}}"></audio>

    <!-- modal -->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.modal')

    <!--Header de imagen -->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.header_imagen')


    <!--pantalla de carga-->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.pantalla_carga')


    <!-- Barra de progreso -->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.barra_progreso')

    <!-- gif pegunta -->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.pregunta_gif')

<!--cuaddro de juego-->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.cuadro_juego')


<!-- Boton de continuar -->

    @include ('registrados.usuariofinal.Nivel-3.componentes_c.boton_continuar')


    <!-- Script JavaScript para el confeti -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>


    <!-- Script JavaScript para nivel1.html -->
    <script src="{{ asset('assets/js/script_c_nivel3.js')}}"></script>
</body>
</html>

