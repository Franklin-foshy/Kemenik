<div id="game-container">
        <div id="game" class="container-game">
            <div id="question-container" >
                <div id="image-container">
                    <div class="imagenes-descrip">
                        <img src="{{ asset('imgs/nivel2/imagen_4.jpeg')}}" alt="Imagen 1" class="image" onclick="checkAnswer(0)">
                        <p class="descripccion" id="descripcion1">{{_('desconocimiento de actividades recreativas')}}</p>
                    </div>
                    <div class="imagenes-descrip">
                        <img src="{{ asset('imgs/nivel2/imagen_4.jpeg')}}" alt="Imagen 2" class="image" onclick="checkAnswer(1)">
                        <p class="descripccion" id="descripcion2">{{_('corresponsabiliad en la familia')}}</p>
                    </div>
                    <div class="imagenes-descrip">
                        <img src="{{ asset('imgs/nivel2/imagen_4.jpeg')}}" alt="Imagen 3" class="image" onclick="checkAnswer(2)">
                        <p class="descripccion" id="descripcion3">{{_('ayudando a mamá con los deberes de la casa')}}</p>
                    </div>
                </div>
                <div id="feedback"></div>
            </div>
            <div id="result">
                <div id="result-text"></div>
                    <button class="volver" id="home-button" href="{{ route('misniveles') }}" onclick="goHome()">{{_('Ir a la página principal')}} </button>
                </div>
        </div>
</div>