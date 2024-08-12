<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Nivel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NivelController extends Controller
{
    public function getMisNivelesAPI(Request $request)
    {
        $niveles = Nivel::where('status', 1)->get();

        if ($niveles->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron niveles',
                'error_code' => 404
            ], 404);
        }

        // Añadir la URL completa de las imágenes
        $niveles->transform(function ($item) {
            $item->imagen = url('niveles/' . $item->imagen);
            return $item;
        });

        return response()->json([
            'data' => $niveles,
            'message' => 'Niveles encontrados',
            'status_code' => 200
        ], 200);
    }

    public function getNivelByIdAPI($id)
    {   
        $nivel = Nivel::find($id);

        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel no encontrado',
                'error_code' => 404
            ], 404);
        }

        // Añadir la URL completa de la imagen
        $nivel->imagen = url('niveles/' . $nivel->imagen);

        return response()->json([
            'data' => $nivel,
            'message' => 'Nivel encontrado',
            'status_code' => 200
        ], 200);
    }

    public function postCreateNivelAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $nivel = new Nivel();
        $nivel->name = $request->input('name');
        $nivel->descripcion = $request->input('descripcion');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('niveles') . '/' . $imageName;
                file_put_contents($imagePath, $decodedImage);
                $nivel->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $nivel->save();

        return response()->json([
            'data' => $nivel,
            'message' => 'Nivel creado satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function postEditNivelAPI(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $nivel = Nivel::find($id);

        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel no encontrado',
                'status_code' => 404
            ], 404);
        }

        $nivel->name = $request->input('name');
        $nivel->descripcion = $request->input('descripcion');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('niveles') . '/' . $imageName;

                // Eliminar la imagen anterior si existe
                if ($nivel->imagen && File::exists(public_path('niveles/' . $nivel->imagen))) {
                    File::delete(public_path('niveles/' . $nivel->imagen));
                }

                // Guardar la nueva imagen
                file_put_contents($imagePath, $decodedImage);
                $nivel->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $nivel->save();

        return response()->json([
            'data' => $nivel,
            'message' => 'Nivel actualizado satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deleteNivelAPI($id)
    {
        $nivel = Nivel::find($id);

        if (!$nivel) {
            return response()->json([
                'message' => 'Nivel no encontrado',
                'status_code' => 404
            ], 404);
        }

        $nivel->status = ($nivel->status == 1) ? 0 : 1;
        $message = ($nivel->status == 1) ? 'Nivel habilitado satisfactoriamente' : 'Nivel inhabilitado satisfactoriamente';
        $nivel->save();

        // Añadir la URL completa de la imagen
        $nivel->imagen = url('niveles/' . $nivel->imagen);

        return response()->json([
            'data' => $nivel,
            'message' => $message,
            'status_code' => 200
        ], 200);
    }
}
