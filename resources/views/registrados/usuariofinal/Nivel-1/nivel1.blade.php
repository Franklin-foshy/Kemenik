<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel1.css')}}">
    <title>{{_('Puzzle')}}</title>
</head>
<body>

<audio id="musica_fondo" src="{{ asset('music/sonido_fondo_nivel1_2.mp3')}}"></audio>
<audio id="audio_correcto" src="{{ asset('music/correcto.mp3')}}"></audio>
<audio id="audio_incorrecto" src="{{ asset('music/incorrecto.mp3')}}"></audio>
<audio id="aplausos" src="{{ asset('music/aplausos.mp3')}}"></audio>

<!--------------------------     barra de carga       ------------------------------->

<!-------------------------------------- Header de imagen ---------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.header_imagen')

<!-------------------------------------- Header de imagen ---------------------------------------------->

<!-------------------------------------- Barra de progreso --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.barra_progreso')

<!-------------------------------------- Barra de progreso --------------------------------------------->

<!-------------------------------------- piezas --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.piezas')

<!-------------------------------------- piezas --------------------------------------------->

<!-------------------------------------- cuadro rompecabezas --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.cuadro_rompecabezas')

<!-------------------------------------- cuadro rompecabezas --------------------------------------------->

<!-------------------------------------- modal --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.modal')

<!-------------------------------------- modal --------------------------------------------->

<!-------------------------------------- contador --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.contador')

<!-------------------------------------- contador --------------------------------------------->

<!-------------------------------------- boton_continuar --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.boton_continuar')

<!-------------------------------------- boton_continuar --------------------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script> 
    <script src="{{ asset('assets/js/script_nivel1.js') }}"></script>
    <script>

    </script>
</body>
</html>