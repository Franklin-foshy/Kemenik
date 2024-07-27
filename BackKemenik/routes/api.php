<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NivelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// NIVELES
Route::get('/niveles', [NivelController::class, 'getMisNivelesAPI']);
Route::get('/niveles/{id}', [NivelController::class, 'getNivelByIdAPI']);
Route::post('/niveles', [NivelController::class, 'postCreateNivelAPI']);
Route::put('/niveles/{id}', [NivelController::class, 'postEditNivelAPI']);
Route::delete('/niveles/{id}', [NivelController::class, 'deleteNivelAPI']);


