<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PRespuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PRespuestasController extends Controller
{
    public function getPRespuestasAPI(Request $request)
    {
        // Obtiene todas las respuestas junto con la información de las preguntas asociadas
        $prespuestas = PRespuesta::with('ppregunta')->get();

        // Verifica si no se encontraron respuestas
        if ($prespuestas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron respuestas',
                'status_code' => 404
            ], 404);
        }

        // Retorna la respuesta en formato JSON si se encontraron respuestas
        return response()->json([
            'data' => $prespuestas,
            'message' => 'Respuestas encontradas',
            'status_code' => 200
        ], 200);
    }

    public function getPRespuestaAPI($id)
    {
        // Busca la respuesta por ID o retornar un error 404 si no se encuentra
        $prespuesta = PRespuesta::with('ppregunta')->find($id);

        // Verifica si no se encontró la respuesta
        if (!$prespuesta) {
            return response()->json([
                'message' => 'Respuesta no encontrada',
                'status_code' => 404
            ], 404);
        }

        // Retorna la respuesta en formato JSON si se encontró la respuesta
        return response()->json([
            'data' => $prespuesta,
            'message' => 'Respuesta encontrada',
            'status_code' => 200
        ], 200);
    }

    public function postPRespuestaAPI(Request $request)
    {
        // Valida los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'ppregunta_id' => 'required|exists:preguntas,id',
            'nombre' => 'required|string|max:255',
            'texto_respuesta' => 'required|string'
        ]);

        // Retorna errores de validación si existen
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Crea una nueva respuesta
        $respuesta = new PRespuesta();
        $respuesta->ppregunta_id = $request->input('ppregunta_id');
        $respuesta->nombre = $request->input('nombre');
        $respuesta->texto_respuesta = $request->input('texto_respuesta');
        $respuesta->save();

        // Retorna una respuesta exitosa
        return response()->json([
            'data' => $respuesta,
            'message' => 'Respuesta creada satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function putEditPRespuestaAPI(Request $request, $id)
    {
        // Valida los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'ppregunta_id' => 'required|exists:preguntas,id',
            'nombre' => 'required|string|max:255',
            'texto_respuesta' => 'required|string'
        ]);

        // Retorna errores de validación si existen
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Encuentra la respuesta por ID o retornar un error 404 si no se encuentra
        $respuesta = PRespuesta::findOrFail($id);

        // Actualiza los atributos de la respuesta
        $respuesta->ppregunta_id = $request->input('ppregunta_id');
        $respuesta->nombre = $request->input('nombre');
        $respuesta->texto_respuesta = $request->input('texto_respuesta');
        $respuesta->save();

        // Retorna una respuesta exitosa
        return response()->json([
            'data' => $respuesta,
            'message' => 'Respuesta actualizada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deletePRespuestaAPI($id)
    {
        // Encuentra la respuesta por ID o retornar un error 404 si no se encuentra
        $respuesta = PRespuesta::findOrFail($id);

        // Alterna el estado de la respuesta
        $respuesta->status = ($respuesta->status == 1) ? 0 : 1;
        $respuesta->save();

        // Determina el mensaje de respuesta basado en el nuevo estado
        $message = ($respuesta->status == 1) ? 'Respuesta habilitada satisfactoriamente' : 'Respuesta inhabilitada satisfactoriamente';

        // Retorna una respuesta exitosa
        return response()->json([
            'data' => $respuesta,
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
