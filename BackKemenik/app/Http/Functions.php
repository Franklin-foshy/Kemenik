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
                'permissions_users' => 'Modificar los permisos del usuario',
                'recover_passwords_users' => 'Reestablecer contraseña'
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
    ];

    return $p;
}
