<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rompecabeza;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class RompecabezaController extends Controller
{
    public function getRompecabezasAPI(Request $request)
    {
        $rompecabezas = Rompecabeza::with('nivel')->get();

        if ($rompecabezas->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron rompecabezas',
                'status_code' => 404
            ], 404);
        }

        // Añadir la URL completa de las imágenes de rompecabeza y del nivel asociado
        $rompecabezas->transform(function ($item) {
            $item->imagen = url('rompecabezas/' . $item->imagen);
            if ($item->nivel) {
                $item->nivel->imagen = url('niveles/' . $item->nivel->imagen);
            }
            return $item;
        });

        return response()->json([
            'rompecabezas' => $rompecabezas,
            'message' => 'Rompecabezas obtenidos satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function getRompecabezaByIdAPI($id)
    {
        $rompecabeza = Rompecabeza::with('nivel')->find($id);

        if ($rompecabeza) {

            // Añadir la URL completa de la imagen del rompecabeza
            $rompecabeza->imagen = url('rompecabezas/' . $rompecabeza->imagen);

            // Añadir la URL completa de la imagen del nivel asociado, si existe
            if ($rompecabeza->nivel) {
                $rompecabeza->nivel->imagen = url('niveles/' . $rompecabeza->nivel->imagen);
            }

            return response()->json([
                'rompecabeza' => $rompecabeza,
                'message' => 'Rompecabeza obtenido satisfactoriamente',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Rompecabeza no encontrado',
                'status_code' => 404
            ], 404);
        }
    }


    public function postCreateRompecabezaAPI(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nivel_id' => 'required|exists:nivels,id',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $rompecabeza = new Rompecabeza();
        $rompecabeza->name = $request->input('name');
        $rompecabeza->nivel_id = $request->input('nivel_id');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('rompecabezas') . '/' . $imageName;
                file_put_contents($imagePath, $decodedImage);
                $rompecabeza->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $rompecabeza->save();

        return response()->json([
            'data' => $rompecabeza,
            'message' => 'Rompecabeza creado satisfactoriamente',
            'status_code' => 201
        ], 201);
    }

    public function postEditRompecabezaAPI(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nivel_id' => 'required|exists:nivels,id',
            'imagen' => 'nullable|string' // Validar que la imagen sea una cadena (Base64)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validación fallida',
                'errors' => $validator->errors(),
                'status_code' => 422
            ], 422);
        }

        $rompecabeza = Rompecabeza::findOrFail($id);
        $rompecabeza->name = $request->input('name');
        $rompecabeza->nivel_id = $request->input('nivel_id');

        if ($request->has('imagen') && !empty($request->input('imagen'))) {
            // Eliminar la imagen anterior si existe
            if ($rompecabeza->imagen && File::exists(public_path('rompecabezas/' . $rompecabeza->imagen))) {
                File::delete(public_path('rompecabezas/' . $rompecabeza->imagen));
            }

            // Guardar la nueva imagen
            $imageData = $request->input('imagen');
            $imageParts = explode(';base64,', $imageData);
            if (count($imageParts) === 2) {
                $decodedImage = base64_decode($imageParts[1]);
                $mimeType = str_replace('data:', '', $imageParts[0]);
                $imageExtension = explode('/', $mimeType)[1];
                $imageName = time() . '.' . $imageExtension;
                $imagePath = public_path('rompecabezas') . '/' . $imageName;
                file_put_contents($imagePath, $decodedImage);
                $rompecabeza->imagen = $imageName;
            } else {
                return response()->json([
                    'message' => 'Formato de imagen inválido',
                    'status_code' => 400
                ], 400);
            }
        }

        $rompecabeza->save();

        return response()->json([
            'data' => $rompecabeza,
            'message' => 'Rompecabeza actualizada satisfactoriamente',
            'status_code' => 200
        ], 200);
    }

    public function deleteRompecabezaAPI($id)
    {
        $rompecabeza = Rompecabeza::find($id);

        if (!$rompecabeza) {
            return response()->json([
                'message' => 'Rompecabeza no encontrado',
                'status_code' => 404
            ], 404);
        }

        $rompecabeza->status = ($rompecabeza->status == 1) ? 0 : 1;
        $message = ($rompecabeza->status == 1) ? 'Rompecabeza habilitada satisfactoriamente' : 'Rompecabeza inhabilitada satisfactoriamente';
        $rompecabeza->save();

        // Añadir la URL completa de la imagen
        $rompecabeza->imagen = url('rompecabezas/' . $rompecabeza->imagen);

        return response()->json([
            'data' => $rompecabeza,
            'message' => $message,
            'status_code' => 200
        ], 200);
    } 
}
