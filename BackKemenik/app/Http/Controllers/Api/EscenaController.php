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
        // Obtener todas las escenas junto con la información del nivel asociado
        $escenas = Escena::with('nivel')->get();

        // Verificar si no se encontraron escenas
        if ($escenas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron escenas',
                'status_code' => 404
            ], 404);
        }

        // Retornar la respuesta en formato JSON si se encontraron escenas
        return response()->json([
            'data' => $escenas,
            'message' => 'Escenas encontradas',
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
        $escena = Escena::findOrFail($id);

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
