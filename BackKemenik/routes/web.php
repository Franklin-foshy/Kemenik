<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;

// Ruta, página inicial al levantar el sistema 
Route::get('/', function () {
    return view('welcome');
});

//verificación de contraseña
Auth::routes(['verify' => true]);

// Ruta, Valida inicio de sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Ruta, Valida inicio de sesión al registrarse manualmente desde App 
Route::post('/register', [UserController::class, 'postUser'])->name('user-register');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/Usuarios', [UserController::class, 'getUsers'])->name('users');
    Route::post('/Usuarios/Nuevo', [UserController::class, 'postUser'])->name('user-post');
    Route::post('/Usuarios/Editar/Usuario/{id}', [UserController::class, 'postEditUser'])->name('user-edit-post');
    Route::post('/Usuarios/Eliminar/Usuario/{id}', [UserController::class, 'deleteUser'])->name('user-delete');
    Route::post('/Usuarios/Permisos/Usuario/{id}', [UserController::class, 'permissionsUser'])->name('user-permissions-post');
    Route::post('/Recuperar/Contraseña/{email}', [UserController::class, 'sendRecoverPassword'])->name('recover-password');

    Route::get('/Roles', [RolController::class, 'getRoles'])->name('roles');
    Route::post('/Roles/Nuevo', [RolController::class, 'postRol'])->name('rol-post');
    Route::post('/Roles/Editar/Rol/{id}', [RolController::class, 'postEditRol'])->name('rol-edit-post');

    Route::get('/MisNiveles', [NivelController::class, 'getMisNiveles'])->name('misniveles');
    Route::post('/Niveles/Nuevo', [NivelController::class, 'postNivel'])->name('nivel-post');
    Route::post('/Niveles/Editar/Nivel/{id}', [NivelController::class, 'postEditNivel'])->name('nivel-edit-post');
    Route::post('/Niveles/Eliminar/Nivel/{id}', [NivelController::class, 'deleteNivel'])->name('nivel-delete');

    Route::get('/MisPreguntas', [PreguntaController::class, 'getPreguntas'])->name('mispreguntas');
    Route::post('/Preguntas/Nuevo', [PreguntaController::class, 'postPregunta'])->name('pregunta-post');
    Route::post('/Preguntas/Editar/Pregunta/{id}', [PreguntaController::class, 'postEditPregunta'])->name('pregunta-edit-post');
    Route::post('/Preguntas/Eliminar/Pregunta/{id}', [PreguntaController::class, 'deletePregunta'])->name('pregunta-delete');

    Route::get('/MisRespuestas', [RespuestaController::class, 'getMisRespuestas'])->name('misrespuestas');
    Route::post('/Respuestas/Nuevo', [RespuestaController::class, 'postRespuesta'])->name('respuesta-post');
    Route::post('/Respuestas/Editar/Respuesta/{id}', [RespuestaController::class, 'postEditRespuesta'])->name('respuesta-edit-post');
    Route::post('/Respuestas/Eliminar/Respuesta/{id}', [RespuestaController::class, 'deleteRespuesta'])->name('respuesta-delete');

    //Usuario final
    Route::get('/home', [NivelController::class, 'getMisNivelesUsuarioFinal'])->name('misniveles');
    Route::get('/nivel/{id}/preguntas', [PreguntaController::class, 'getPreguntasPorNivel'])->name('nivel.preguntas');
});
