<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\RompecabezaController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EscenaController;
use App\Http\Controllers\PPreguntaController;
use App\Http\Controllers\PRespuestaController;

use App\Http\Controllers\ProgresoUsuarioController;

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

    Route::get('/Nivels', [NivelController::class, 'getNivels'])->name('nivels');
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

    Route::get('/MisRompecabezas', [RompecabezaController::class, 'getMisRompecabezas'])->name('misrompecabezas');
    Route::post('/Rompecabezas/Nuevo', [RompecabezaController::class, 'postRompecabeza'])->name('rompecabeza-post');
    Route::post('/Rompecabezas/Editar/Rompecabeza/{id}', [RompecabezaController::class, 'postEditRompecabeza'])->name('rompecabeza-edit-post');
    Route::post('/Rompecabezas/Eliminar/Rompecabeza/{id}', [RompecabezaController::class, 'deleteRompecabeza'])->name('rompecabeza-delete');

    Route::get('/Escenas', [EscenaController::class, 'getEscenas'])->name('escenas');
    Route::post('/Escenas/Nuevo', [EscenaController::class, 'postEscena'])->name('escena-post');
    Route::post('/Escenas/Editar/Escena/{id}', [EscenaController::class, 'postEditEscena'])->name('escena-edit-post');
    Route::post('/Escenas/Eliminar/Escena/{id}', [EscenaController::class, 'deleteEscena'])->name('escena-delete');

    Route::get('/PPreguntas', [PPreguntaController::class, 'getPPreguntas'])->name('ppreguntas');
    Route::post('/PPreguntas/Nuevo', [PPreguntaController::class, 'postPPregunta'])->name('ppregunta-post');
    Route::post('/PPreguntas/Editar/PPreguntas/{id}', [PPreguntaController::class, 'postEditPPregunta'])->name('ppregunta-edit-post');
    Route::post('/PPreguntas/Eliminar/PPreguntas/{id}', [PPreguntaController::class, 'deletePPregunta'])->name('ppregunta-delete');

    Route::get('/PRespuestas', [PRespuestaController::class, 'getPRespuestas'])->name('prespuestas');
    Route::post('/PRespuestas/Nuevo', [PRespuestaController::class, 'postPRespuesta'])->name('prespuesta-post');
    Route::post('/PRespuestas/Editar/PRespuestas/{id}', [PRespuestaController::class, 'postEditPRespuesta'])->name('prespuesta-edit-post');
    Route::post('/PRespuestas/Eliminar/PRespuestas/{id}', [PRespuestaController::class, 'deletePRespuesta'])->name('prespuesta-delete');

    Route::get('/progresoUsuarioUno', [ProgresoUsuarioController::class, 'getProgresoUsuarioUno'])->name('progresousuariouno');
    Route::get('/progresoUsuarioDos', [ProgresoUsuarioController::class, 'getProgresoUsuarioDos'])->name('progresousuariodos');

    // RUTA COMPARTIDA, DEBE DE ORDENARSE (TAREA DE RONALD)
    Route::get('/home', [NivelController::class, 'ResultadoNiveles'])->name('misniveles');

    Route::get('/nivel/{id}', function ($id) {
        switch ($id) {
            case 1:
                return view('registrados.usuariofinal.Nivel-1.nivel1');
            case 2:
                return view('registrados.usuariofinal.Nivel-2.nivel2');
            case 3:
                return view('registrados.usuariofinal.Nivel-3.nivel3');
            default:
                abort(404);
        }
    })->name('nivel');
});
