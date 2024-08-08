<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PPreguntasController extends Controller
{
    public function getAllPPreguntasAPI(Request $request)
    {
        // Obtiene todas las preguntas junto con la información del nivel y escena asociados
        $ppreguntas = PPregunta::with(['nivel', 'escena'])->get();

        // Verifica si no se encontraron preguntas
        if ($ppreguntas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron preguntas',
                'status_code' => 404
            ], 404);
        }

        // Retorna la respuesta en formato JSON si se encontraron preguntas
        return response()->json([
            'ppreguntas' => $ppreguntas,
            'message' => 'Datos recuperados satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function getPPreguntaByIdAPI($id)
    {
        // Intenta encontrar la pregunta por su ID
        $ppregunta = PPregunta::with(['nivel', 'escena'])->find($id);

        // Verifica si la pregunta no fue encontrada
        if (!$ppregunta) {
            return response()->json([
                'message' => 'Pregunta no encontrada',
                'status_code' => 404
            ], 404);
        }

        // Retorna la respuesta en formato JSON si se encontró la pregunta
        return response()->json([
            'ppregunta' => $ppregunta,
            'message' => 'Pregunta encontrada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function createPPreguntaAPI(Request $request)
    {
        // Valida los datos del request
        $validator = Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'escena_id' => 'required|exists:escenas,id',
            'nombre' => 'required|string|max:255',
            'texto_pregunta' => 'required|string',
            'texto_respuesta' => 'required|string',
        ]);

        // Verifica si la validación falla
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Crea una nueva pregunta
        $p = new PPregunta();
        $p->nivel_id = $request->input('nivel_id');
        $p->escena_id = $request->input('escena_id');
        $p->nombre = $request->input('nombre');
        $p->texto_pregunta = $request->input('texto_pregunta');
        $p->texto_respuesta = $request->input('texto_respuesta');
        $p->save();

        // Retorna la respuesta en formato JSON
        return response()->json([
            'data' => $p,
            'message' => 'Personaje pregunta creado satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function putEditPPreguntaAPI(Request $request, $id)
    {
        // Valida los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'escena_id' => 'required|exists:escenas,id',
            'nombre' => 'required|string|max:255',
            'texto_pregunta' => 'required|string',
            'texto_respuesta' => 'required|string',
        ]);

        // Retorna errores de validación si existen
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Encuentra la pregunta por ID o retornar un error 404 si no se encuentra
        $ppregunta = PPregunta::findOrFail($id);

        // Actualiza los atributos de la pregunta
        $ppregunta->nivel_id = $request->input('nivel_id');
        $ppregunta->escena_id = $request->input('escena_id');
        $ppregunta->nombre = $request->input('nombre');
        $ppregunta->texto_pregunta = $request->input('texto_pregunta');
        $ppregunta->texto_respuesta = $request->input('texto_respuesta');
        $ppregunta->save();

        // Retorna una respuesta exitosa
        return response()->json([
            'data' => $ppregunta,
            'message' => 'Personaje pregunta actualizado satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deletePPreguntaAPI($id)
    {
        // Encuentra la pregunta por ID o retornar un error 404 si no se encuentra
        $ppregunta = PPregunta::findOrFail($id);

        // Alterna el estado de la pregunta
        $ppregunta->status = ($ppregunta->status == 1) ? 0 : 1;
        $ppregunta->save();

        // Determina el mensaje de respuesta basado en el nuevo estado
        $message = ($ppregunta->status == 1) ? 'Pregunta habilitada satisfactoriamente' : 'Pregunta inhabilitada satisfactoriamente';

        // Retorna una respuesta exitosa
        return response()->json([
            'data' => $ppregunta,
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
