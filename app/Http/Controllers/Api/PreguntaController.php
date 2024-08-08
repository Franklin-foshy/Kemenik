<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pregunta;
use Illuminate\Support\Facades\Validator;


class PreguntaController extends Controller
{
    public function getPreguntasAPI(Request $request)
    {
        $preguntas = Pregunta::with('nivel')->get();

        if ($preguntas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron preguntas',
                'status_code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $preguntas,
            'message' => 'Preguntas encontradas',
            'status_code' => 200
        ], 200);
    }

    public function getPreguntaByIdAPI($id)
    {
        $pregunta = Pregunta::with('nivel')->find($id);

        if (!$pregunta) {
            return response()->json([
                'message' => 'Pregunta no encontrada',
                'status_code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $pregunta,
            'message' => 'Pregunta encontrada',
            'status_code' => 200
        ], 200);
    }

    public function postPreguntaAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'texto_pregunta' => 'required|string|max:255',
            'texto_respuesta' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $pregunta = new Pregunta;
        $pregunta->nivel_id = $request->input('nivel_id');
        $pregunta->texto_pregunta = $request->input('texto_pregunta');
        $pregunta->texto_respuesta = $request->input('texto_respuesta');
        $pregunta->save();

        return response()->json([
            'data' => $pregunta,
            'message' => 'Pregunta creada satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function postEditPreguntaAPI(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nivel_id' => 'required|exists:nivels,id',
            'texto_pregunta' => 'required|string|max:255',
            'texto_respuesta' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $pregunta = Pregunta::findOrFail($id);
        $pregunta->nivel_id = $request->input('nivel_id');
        $pregunta->texto_pregunta = $request->input('texto_pregunta');
        $pregunta->texto_respuesta = $request->input('texto_respuesta');
        $pregunta->save();

        return response()->json([
            'data' => $pregunta,
            'message' => 'Pregunta actualizada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deletePreguntaAPI($id)
    {
        $pregunta = Pregunta::findOrFail($id);
        $pregunta->status = ($pregunta->status == 1) ? 0 : 1;
        $message = ($pregunta->status == 1) ? 'Pregunta habilitada satisfactoriamente' : 'Pregunta inhabilitada satisfactoriamente';
        $pregunta->save();

        return response()->json([
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
