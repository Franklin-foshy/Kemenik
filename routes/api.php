<?php

use App\Http\Controllers\Api\EscenaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NivelController;
use App\Http\Controllers\Api\PPreguntasController;
use App\Http\Controllers\Api\PreguntaController;
use App\Http\Controllers\Api\PRespuestasController;
use App\Http\Controllers\Api\ProgresoUsuarioController;
use App\Http\Controllers\Api\RespuestaController;
use App\Http\Controllers\Api\RompecabezaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// NIVELES
Route::get('/niveles', [NivelController::class, 'getMisNivelesAPI']);
Route::get('/niveles/{id}', [NivelController::class, 'getNivelByIdAPI']);
Route::post('/niveles', [NivelController::class, 'postCreateNivelAPI']);
Route::put('/niveles/{id}', [NivelController::class, 'postEditNivelAPI']);
Route::delete('/niveles/{id}', [NivelController::class, 'deleteNivelAPI']);

// PREGUNTAS
Route::get('/preguntas', [PreguntaController::class, 'getPreguntasAPI']);
Route::get('/preguntas/{id}', [PreguntaController::class, 'getPreguntaByIdAPI']);
Route::post('/preguntas', [PreguntaController::class, 'postPreguntaAPI']);
Route::put('/preguntas/{id}', [PreguntaController::class, 'postEditPreguntaAPI']);
Route::delete('/preguntas/{id}', [PreguntaController::class, 'deletePreguntaAPI']);
Route::get('/preguntas_por_nivel/{nivel_id}', [PreguntaController::class, 'getPreguntasPorNivel']);


// RESPUESTAS
Route::get('/respuestas', [RespuestaController::class, 'getRespuestasAPI']);
Route::get('/respuestas/{id}', [RespuestaController::class, 'getRespuestaByIdAPI']);
Route::post('/respuestas', [RespuestaController::class, 'postRespuestaAPI']);
Route::put('/respuestas/{id}', [RespuestaController::class, 'postEditRespuestaAPI']);
Route::delete('/respuestas/{id}', [RespuestaController::class, 'deleteRespuestaAPI']);
Route::get('/respuestas_por_pregunta/{pregunta_id}', [RespuestaController::class, 'getRespuestasPorPregunta']);


// ROMPECABEZAS
Route::get('/rompecabezas', [RompecabezaController::class, 'getRompecabezasAPI']);
Route::get('/rompecabezas/{id}', [RompecabezaController::class, 'getRompecabezaByIdAPI']);
Route::post('/rompecabezas', [RompecabezaController::class, 'postCreateRompecabezaAPI']);
Route::put('/rompecabezas/{id}', [RompecabezaController::class, 'postEditRompecabezaAPI']);
Route::delete('/rompecabezas/{id}', [RompecabezaController::class, 'deleteRompecabezaAPI']);

// ESCENAS
Route::get('/escenas', [EscenaController::class, 'getEscenasAPI']);
Route::get('/escenas/{id}', [EscenaController::class, 'getEscenaAPI']);
Route::post('/escenas', [EscenaController::class, 'postCreateEscenaAPI']);
Route::put('/escenas/{id}', [EscenaController::class, 'putEditEscenaAPI']);
Route::delete('/escenas/{id}', [EscenaController::class, 'deleteEscenaAPI']);

// PERSONAJES PPREGUNTAS
Route::get('/ppreguntas', [PPreguntasController::class, 'getAllPPreguntasAPI']);
Route::get('/ppreguntas/{id}', [PPreguntasController::class, 'getPPreguntaByIdAPI']);
Route::post('/ppreguntas', [PPreguntasController::class, 'createPPreguntaAPI']);
Route::put('/ppreguntas/{id}', [PPreguntasController::class, 'putEditPPreguntaAPI']);
Route::delete('/ppreguntas/{id}', [PPreguntasController::class, 'deletePPreguntaAPI']);
Route::get('/personaje_preguntas_por_escena/{escena_id}', [PPreguntasController::class, 'getPPreguntasPorEscena']);

// PERSONAJES RESPUESTAS
Route::get('/prespuestas', [PRespuestasController::class, 'getPRespuestasAPI']);
Route::get('/prespuestas/{id}', [PRespuestasController::class, 'getPRespuestaAPI']);
Route::post('/prespuestas', [PRespuestasController::class, 'postPRespuestaAPI']);
Route::put('/prespuestas/{id}', [PRespuestasController::class, 'putEditPRespuestaAPI']);
Route::delete('/prespuestas/{id}', [PRespuestasController::class, 'deletePRespuestaAPI']);
Route::get('/respuestas_por_ppreguntas/{ppregunta_id}', [PRespuestasController::class, 'getRespuestasPorPPregunta']);

// PROGRESO DE USUARIO
Route::get('progreso/{id}', [ProgresoUsuarioController::class, 'show']);
Route::post('/progreso-usuario', [ProgresoUsuarioController::class, 'store']);
Route::get('/progreso-usuario/{usuario_id}', [ProgresoUsuarioController::class, 'getByUserId']);
Route::delete('/progreso-usuario/{usuario_id}/registro/{id}', [ProgresoUsuarioController::class, 'deleteByUserId']);