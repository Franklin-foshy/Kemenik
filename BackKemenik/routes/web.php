<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;

use App\Http\Controllers\Auth\LoginController;

// Ruta, página inicial al levantar el sistema 
Route::get('/', function () {
    return view('welcome');
});

// Validación por correo electrónico
Auth::routes(['verify' => false]);

// Redirecciona a esta ruta despues de que se valide el correo electrónico
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified'); */

// Registro usuario sin estar logeado
Route::post('/register', [UserController::class, 'postUser'])->name('user-register');

// Obtener paises, departamentos y municipios dinámicamente
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::get('/getDepartamentos/{pais_id}', [UserController::class, 'getDepartamentos'])->name('get.departamentos');
Route::get('/getMunicipios/{departamento_id}', [UserController::class, 'getMunicipios'])->name('get.municipios');


// Rutas integradas por inicio de sesión con teléfono
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Fin rutas integradas por inicio de sesión con teléfono

// Rutas protegidas
Route::group(['middleware' => ['auth']], function () {

    Route::get('/Usuarios', [UserController::class, 'getUsers'])->name('users');
    Route::post('/Usuarios/Nuevo', [UserController::class, 'postUser'])->name('user-post');
    Route::post('/Usuarios/Editar/Usuario/{id}', [UserController::class, 'postEditUser'])->name('user-edit-post');
    Route::post('/Usuarios/Eliminar/Usuario/{id}', [UserController::class, 'deleteUser'])->name('user-delete');

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

    //Usuario final logeado
    Route::get('/home', [NivelController::class, 'getMisNivelesUsuarioFinal'])->name('misniveles');
    Route::get('/nivel/{id}/preguntas', [PreguntaController::class, 'getPreguntasPorNivel'])->name('nivel.preguntas');
});
