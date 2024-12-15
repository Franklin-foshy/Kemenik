<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel1.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{_('Puzzle')}}</title>
</head>
<body>

<audio id="musica_fondo" src="{{ asset('music/sonido_fondo_nivel1_2.mp3')}}"></audio>
<audio id="audio_correcto" src="{{ asset('music/correcto.mp3')}}"></audio>
<audio id="audio_incorrecto" src="{{ asset('music/incorrecto.mp3')}}"></audio>
<audio id="aplausos" src="{{ asset('music/aplausos.mp3')}}"></audio>




@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.modal_instrucciones')


<!-------------------------- Pantalla de carga ------------------------>

    @include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.pantalla_carga')

<!-------------------------- Pantalla de carga ------------------------>


<!--------------------------     barra de carga       ------------------------------->

<!-------------------------------------- Header de imagen ---------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.header_imagen')

<!-------------------------------------- Header de imagen ---------------------------------------------->

<!-------------------------------------- Barra de progreso --------------------------------------------->
<div class="container container-progress-bar col-12 col-xl-8 mt-5 mt-xl-0">
    @include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.barra_progreso')
</div>
<!-------------------------------------- Barra de progreso --------------------------------------------->

<!-------------------------------------- piezas --------------------------------------------->
<div class="constainer-fluid marco-romp">
@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.piezas')

<!-------------------------------------- piezas --------------------------------------------->

<!-------------------------------------- cuadro rompecabezas --------------------------------------------->

    @include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.cuadro_rompecabezas')
</div>
<!-------------------------------------- cuadro rompecabezas --------------------------------------------->

<!-------------------------------------- modal --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.modal')

<!-------------------------------------- modal --------------------------------------------->

<!-------------------------------------- contador --------------------------------------------->

@include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.contador')

<!-------------------------------------- contador --------------------------------------------->

<!-------------------------------------- boton_continuar --------------------------------------------->
<div class="container btn-continuar col-12 col-xl-8">
    @include ('registrados.usuariofinal.Nivel-1.componentes_nivel1.boton_continuar')
</div>

<!-------------------------------------- boton_continuar --------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var listaImagenes = ["{{ asset('imgs/nivel1/nivel_1_1.jpeg') }}","{{ asset('imgs/nivel1/nivel_1_2.jpeg') }}","{{ asset('imgs/nivel1/nivel_1_3.jpeg') }}"];
    </script>

    <script  src="{{ asset('assets/js/script_nivel1.js') }}"></script>
    
</body>
</html>