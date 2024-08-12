<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Escena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EscenaController extends Controller
{
    public function getEscenasAPI(Request $request)
    {
        $escenas = Escena::with('nivel')->get();

        if ($escenas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron escenas',
                'status_code' => 404
            ], 404);
        }

        // Añadir la URL completa de la imagen del nivel asociado
        $escenas->transform(function ($item) {
            if ($item->nivel && !str_starts_with($item->nivel->imagen, 'http')) {
                $item->nivel->imagen = url('niveles/' . $item->nivel->imagen);
            }
            return $item;
        });

        return response()->json([
            'data' => $escenas,
            'message' => 'Escenas obtenidas satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function getEscenaAPI($id)
    {
        // Buscar la escena por su ID y cargar la información del nivel asociado
        $escena = Escena::with('nivel')->find($id);

        // Verificar si la escena no se encuentra
        if (!$escena) {
            return response()->json([
                'message' => 'Escena no encontrada',
                'status_code' => 404
            ], 404);
        }

        // Añadir la URL completa de la imagen del nivel asociado, si existe
        if ($escena->nivel && !str_starts_with($escena->nivel->imagen, 'http')) {
            $escena->nivel->imagen = url('niveles/' . $escena->nivel->imagen);
        }

        // Retornar la respuesta en formato JSON si se encuentra la escena
        return response()->json([
            'escena' => $escena,
            'message' => 'Escena obtenida satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function postCreateEscenaAPI(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:255',
            'nivel_id' => 'required|exists:nivels,id',
        ]);

        // Retornar errores de validación si existen
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Crear una nueva instancia del modelo Escena
        $escena = new Escena();
        $escena->descripcion = $request->input('descripcion');
        $escena->nivel_id = $request->input('nivel_id');
        $escena->save();

        // Retornar una respuesta exitosa
        return response()->json([
            'data' => $escena,
            'message' => 'Escena creada satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function putEditEscenaAPI(Request $request, $id)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:255',
            'nivel_id' => 'required|exists:nivels,id',
        ]);

        // Retornar errores de validación si existen
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        // Encontrar la escena por ID o retornar un error 404 si no se encuentra
        $escena = Escena::findOrFail($id);

        // Actualizar los atributos de la escena
        $escena->descripcion = $request->input('descripcion');
        $escena->nivel_id = $request->input('nivel_id');
        $escena->save();

        // Retornar una respuesta exitosa
        return response()->json([
            'data' => $escena,
            'message' => 'Escena actualizada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deleteEscenaAPI($id)
    {
        // Encontrar la escena por ID o retornar un error 404 si no se encuentra
        $escena = Escena::find($id);

        // Valida la existencia de la escena
        if (!$escena) {
            return response()->json([
                'message' => 'Escena no encontrada',
                'status_code' => 404
            ], 404);
        }

        // Alternar el estado de la escena
        $escena->status = ($escena->status == 1) ? 0 : 1;
        $escena->save();

        // Determinar el mensaje de respuesta basado en el nuevo estado
        $message = ($escena->status == 1) ? 'Escena habilitada satisfactoriamente' : 'Escena inhabilitada satisfactoriamente';

        // Retornar una respuesta exitosa
        return response()->json([
            'data' => $escena,
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
