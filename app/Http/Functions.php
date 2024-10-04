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
                'delete_niveles' => 'Habilitar/Desabilitar niveles',
            ]
        ],
        'preguntas' => [
            'title' => 'Módulo de preguntas',
            'keys' => [
                'get_preguntas' => 'Ver preguntas',
                'post_preguntas' => 'Crear preguntas',
                'edit_preguntas' => 'Editar preguntas',
                'delete_preguntas' => 'Habilitar/Desabilitar preguntas',
                'delete_preguntas_total' => 'Eliminar preguntas',
            ]
        ],
        'respuestas' => [
            'title' => 'Módulo de respuestas',
            'keys' => [
                'get_respuestas' => 'Ver respuestas',
                'post_respuestas' => 'Crear respuestas',
                'edit_respuestas' => 'Editar respuestas',
                'delete_respuestas' => 'Habilitar/Desabilitar respuestas',
                'delete_respuestas' => 'Eliminar respuestas',
            ]
        ],
        'rompecabezas' => [
            'title' => 'Módulo de rompecabezas',
            'keys' => [
                'get_rompecabezas' => 'Ver rompecabezas',
                'post_rompecabezas' => 'Crear rompecabezas',
                'edit_rompecabezas' => 'Editar rompecabezas',
                'delete_rompecabezas' => 'Habilitar/Desabilitar rompecabezas',
            ]
        ],
        'escenas' => [
            'title' => 'Módulo de escenas',
            'keys' => [
                'get_escenas' => 'Ver escenas',
                'post_escenas' => 'Crear escenas',
                'edit_escenas' => 'Editar escenas',
                'delete_escenas' => 'Habilitar/Desabilitar escenas',
            ]
        ],
        'personaje preguntas' => [
            'title' => 'Módulo de personaje preguntas',
            'keys' => [
                'get_ppreguntas' => 'Ver personaje preguntas',
                'post_ppreguntas' => 'Crear personaje preguntas',
                'edit_ppreguntas' => 'Editar personaje preguntas',
                'delete_ppreguntas' => 'Habilitar/Desabilitar personaje preguntas',
            ]
        ],
        'personaje respuestas' => [
            'title' => 'Módulo de personaje respuestas',
            'keys' => [
                'get_prespuestas' => 'Ver personaje respuestas',
                'post_prespuestas' => 'Crear personaje respuestas',
                'edit_prespuestas' => 'Editar personaje respuestas',
                'delete_prespuestas' => 'Habilitar/Desabilitar personaje respuestas',
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
