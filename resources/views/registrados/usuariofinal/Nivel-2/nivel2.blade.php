<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/styles_nivel2.css')}}">
    <title>{{_('Nivel 2')}}</title>
</head>
<body>

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

<div id="vidas">
    <span class="vida"></span>
</div>

<!---------------------- vidas ------------------------>

<!------------------------------ marco historia ------------------------------------>

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.marco_historia')

<!------------------------------ marco historia ------------------------------------>


<!-------------------------------------- Boton siguiente --------------------------------------------->

@include('registrados.usuariofinal.Nivel-2.componenetes_nivel2.boton_historia')

<!-------------------------------------- Boton siguiente --------------------------------------------->

<!-------------------------------------- Boton salir --------------------------------------------->

<button class = "continuar" id="regresar"  href="{{ route('misniveles')}}" style="display:none;" onclick="goHome()">{{_('Regresar')}}</button>
<button class = "continuar" id="siguiente_escena" style="display:none;">{{_('Siguiente')}}</button>
<!-------------------------------------- Boton salir --------------------------------------------->


    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>

    <script src="{{ asset('assets/js/historia_nivel2.js')}}"></script>
</body>

</html>


