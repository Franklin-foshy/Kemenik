<?php

function kvfj($json, $key)
{
    if ($json) {
        $json = json_decode($json, true);
        return isset($json[$key]) && $json[$key] !== "off" ? $json[$key] : null;
    }
    return null;
}

function permissionsUser()
{
    $p = [
        'administrador' => [
            'title' => 'Administrador',
            'keys' => [
                'admin' => 'Administrador',
            ]
        ],
        'usuariofinal' => [
            'title' => 'Usuario Final',
            'keys' => [
                'usuariofinal' => 'Usuario Final',
            ]
        ],
        'roles' => [
            'title' => 'Módulo de Roles',
            'keys' => [
                'get_roles' => 'Ver roles',
                'post_roles' => 'Crear roles',
                'edit_roles' => 'Editar roles',
            ]
        ],
        'users' => [
            'title' => 'Módulo de Usuarios',
            'keys' => [
                'get_users' => 'Ver usuarios',
                'post_users' => 'Crear usuarios',
                'edit_users' => 'Editar usuarios',
                'delete_users' => 'Suspender usuarios',
            ]
        ],
        'niveles' => [
            'title' => 'Módulo de Niveles',
            'keys' => [
                'get_niveles' => 'Ver niveles',
                'post_niveles' => 'Crear niveles',
                'edit_niveles' => 'Editar niveles',
                'delete_niveles' => 'Eliminar niveles',
            ]
        ],
        'preguntas' => [
            'title' => 'Módulo de preguntas',
            'keys' => [
                'get_preguntas' => 'Ver preguntas',
                'post_preguntas' => 'Crear preguntas',
                'edit_preguntas' => 'Editar preguntas',
                'delete_preguntas' => 'Eliminar preguntas',
            ]
        ],
        'respuestas' => [
            'title' => 'Módulo de respuestas',
            'keys' => [
                'get_respuestas' => 'Ver respuestas',
                'post_respuestas' => 'Crear respuestas',
                'edit_respuestas' => 'Editar respuestas',
                'delete_respuestas' => 'Eliminar respuestas',
            ]
        ],
        'rompecabezas' => [
            'title' => 'Módulo de rompecabezas',
            'keys' => [
                'get_rompecabezas' => 'Ver rompecabezas',
                'post_rompecabezas' => 'Crear rompecabezas',
                'edit_rompecabezas' => 'Editar rompecabezas',
                'delete_rompecabezas' => 'Eliminar rompecabezas',
            ]
        ],
        'escenas' => [
            'title' => 'Módulo de escenas',
            'keys' => [
                'get_escenas' => 'Ver escenas',
                'post_escenas' => 'Crear escenas',
                'edit_escenas' => 'Editar escenas',
                'delete_escenas' => 'Eliminar escenas',
            ]
        ],
        'personaje preguntas' => [
            'title' => 'Módulo de personaje preguntas',
            'keys' => [
                'ppreguntas' => 'Ver personaje preguntas',
                'ppreguntas' => 'Crear personaje preguntas',
                'ppreguntas' => 'Editar personaje preguntas',
                'ppreguntas' => 'Eliminar personaje preguntas',
            ]
        ],
        'personaje respuestas' => [
            'title' => 'Módulo de personaje respuestas',
            'keys' => [
                'prespuestas' => 'Ver personaje respuestas',
                'prespuestas' => 'Crear personaje respuestas',
                'prespuestas' => 'Editar personaje respuestas',
                'prespuestas' => 'Eliminar personaje respuestas',
            ]
        ],
        'Progreso usuarios' => [
            'title' => 'Módulo progreso usuarios',
            'keys' => [
                'get_progresoUsuario' => 'Ver progreso usuario',
            ]
        ],
    ];

    return $p;
}
