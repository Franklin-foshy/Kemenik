<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NivelController;
use App\Http\Controllers\Api\PreguntaController;
use App\Http\Controllers\Api\RespuestaController;

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


// RESPUESTAS
Route::get('/respuestas', [RespuestaController::class, 'getRespuestasAPI']);
Route::get('/respuestas/{id}', [RespuestaController::class, 'getRespuestaByIdAPI']);
Route::post('/respuestas', [RespuestaController::class, 'postRespuestaAPI']);
Route::put('/respuestas/{id}', [RespuestaController::class, 'postEditRespuestaAPI']);
Route::delete('/respuestas/{id}', [RespuestaController::class, 'deleteRespuestaAPI']);
