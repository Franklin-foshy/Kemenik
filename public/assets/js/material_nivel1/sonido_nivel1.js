
// ---------------------------------- Audio ------------------------------------

export function sonido() {
    var musica = document.getElementById('musica_fondo');
    var audio_correcto = document.getElementById('audio_correcto');
    var audio_incorrecto = document.getElementById('audio_incorrecto');
    var aplausos = document.getElementById('aplausos');

    return { musica, audio_correcto, audio_incorrecto, aplausos };
}

// ---------------------------------- Audio ------------------------------------