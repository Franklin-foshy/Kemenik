<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Respuesta;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class RespuestaController extends Controller
{
    public function getRespuestasAPI(Request $request)
    {
        $respuestas = Respuesta::with('pregunta')->get();

        if ($respuestas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron respuestas',
                'status_code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $respuestas,
            'message' => 'Respuestas encontradas',
            'status_code' => 200
        ], 200);
    }

    public function getRespuestaByIdAPI($id)
    {
        $respuesta = Respuesta::with('pregunta')->find($id);

        if (!$respuesta) {
            return response()->json([
                'message' => 'Respuesta no encontrada',
                'status_code' => 404
            ], 404);
        }

        return response()->json([
            'data' => $respuesta,
            'message' => 'Respuesta encontrada',
            'status_code' => 200
        ], 200);
    }

    public function postRespuestaAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pregunta_id' => 'required|exists:preguntas,id',
            'texto_respuesta' => 'required|string|max:255',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $respuesta = new Respuesta;
        $respuesta->pregunta_id = $request->input('pregunta_id');
        $respuesta->texto_respuesta = $request->input('texto_respuesta');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('respuestas') . '/' . $imageName;
                file_put_contents($imagePath, $decodedImage);
                $respuesta->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $respuesta->save();

        return response()->json([
            'data' => $respuesta,
            'message' => 'Respuesta creada satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function postEditRespuestaAPI(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pregunta_id' => 'required|exists:preguntas,id',
            'texto_respuesta' => 'required|string|max:255',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $respuesta = Respuesta::findOrFail($id);
        $respuesta->pregunta_id = $request->input('pregunta_id');
        $respuesta->texto_respuesta = $request->input('texto_respuesta');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            // Eliminar la imagen anterior si existe
            if ($respuesta->imagen && File::exists(public_path('respuestas/' . $respuesta->imagen))) {
                File::delete(public_path('respuestas/' . $respuesta->imagen));
            }

            // Guardar la nueva imagen
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('respuestas') . '/' . $imageName;
                file_put_contents($imagePath, $decodedImage);
                $respuesta->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $respuesta->save();

        return response()->json([
            'data' => $respuesta,
            'message' => 'Respuesta actualizada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deleteRespuestaAPI($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->status = ($respuesta->status == 1) ? 0 : 1;
        $message = ($respuesta->status == 1) ? 'Respuesta habilitada satisfactoriamente' : 'Respuesta inhabilitada satisfactoriamente';
        $respuesta->save();

        return response()->json([
            'data' => $respuesta,
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
