<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgresoUsuario;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProgresoUsuarioController extends Controller
{
    // FUNCIÓN PARA CREAR UN NUEVO REGISTRO DE AVANCES
    public function store(Request $request)
    {
        // Mensajes de error personalizados
        $messages = [
            'usuario_id.required' => 'El campo usuario es obligatorio.',
            'usuario_id.exists' => 'El usuario seleccionado no es válido.',
            'nivel_id.required' => 'El campo nivel es obligatorio.',
            'nivel_id.exists' => 'El nivel seleccionado no es válido.',
            'completado.required' => 'El campo completado es obligatorio.',
            'completado.boolean' => 'El valor de completado debe ser 0 o 1.',
            'intentos.required' => 'El campo intentos es obligatorio.',
            'intentos.integer' => 'El campo intentos debe ser un número entero.',
            'intentos.min' => 'El campo intentos debe ser al menos 0.',
            'intentos.max' => 'El campo intentos no puede ser mayor que 3.',
            'puntuacion.required' => 'El campo puntuación es obligatorio.',
            'puntuacion.integer' => 'El campo puntuación debe ser un número entero.',
            'puntuacion.min' => 'El campo puntuación debe ser al menos 0.',
            'puntuacion.max' => 'El campo puntuación no puede ser mayor que 100.',
            'estado_proceso.required' => 'El campo estado de proceso es obligatorio.',
            'estado_proceso.in' => 'El estado de proceso seleccionado no es válido.',
            'status.required' => 'El campo status es obligatorio.',
            'status.boolean' => 'El valor de status debe ser 0 o 1.',
        ];

        try {
            // Validar los datos recibidos con mensajes personalizados
            $validated = $request->validate([
                'usuario_id' => 'required|exists:users,id',
                'nivel_id' => 'required|exists:nivels,id',
                'completado' => 'required|boolean',
                'intentos' => 'required|integer|min:0|max:3',
                'puntuacion' => 'required|integer|min:0|max:100',
                'estado_proceso' => 'required|integer|in:1,2',
                'status' => 'required|boolean',
            ], $messages);

            // Crear un nuevo registro en la base de datos
            $progresoUsuario = ProgresoUsuario::create($validated);

            // Retornar la respuesta
            return response()->json([
                'data' => $progresoUsuario,
                'message' => 'Progreso del usuario creado exitosamente',
                'status_code' => 200
            ], 200);
        } catch (ValidationException $e) {
            // Capturar la excepción de validación y devolver un JSON con los errores
            return response()->json([
                'message' => 'Errores de validación',
                'errors' => $e->errors()
            ], 422);
        }
    }

    // FUNCIÓN PARA OBTENER UN AVANCE EN ESPECIFICO
    public function show($id)
    {
        try {
            // Consultar el registro con las relaciones de usuario y nivel
            $progresoUsuario = ProgresoUsuario::with(['usuario', 'nivel'])->findOrFail($id);

            // Retornar la respuesta con la data
            return response()->json([
                'data' => $progresoUsuario,
                'message' => 'Progreso obtenido exitosamente',
                'status_code' => 200
            ], 200);
        } catch (ModelNotFoundException $e) {
            // Manejar la excepción si el registro no es encontrado
            return response()->json([
                'message' => 'No se encontró el progreso solicitado',
                'status_code' => 404
            ], 404);
        }
    }

    // FUNCIÓN PARA OBTENER TODO EL AVANCE DE UN USUARIO EN ESPECIFICO
    public function getByUserId($usuario_id)
    {
        // Obtener todos los registros asociados a usuario_id
        $progresosUsuario = ProgresoUsuario::with(['usuario', 'nivel'])
            ->where('usuario_id', $usuario_id)
            ->get();

        // Verificar si se encontraron registros
        if ($progresosUsuario->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron registros para el usuario especificado',
                'status_code' => 404
            ], 404);
        }

        // Retornar la respuesta con los registros encontrados
        return response()->json([
            'data' => $progresosUsuario,
            'message' => 'Registros del progreso del usuario obtenidos exitosamente',
            'status_code' => 200
        ], 200);
    }

    // FUNCIÓN PARA ELIMINAR UN REGISTRO EN ESPECIFICO DE UN USUARIO EN ESPECIFICO
    public function deleteByUserId($usuario_id, $id)
    {
        // Validar que el usuario_id existe en la tabla de usuarios
        $usuarioExiste = \App\Models\User::where('id', $usuario_id)->exists();

        // Validar que el id del registro existe en la tabla progreso_usuarios
        $registroExiste = ProgresoUsuario::where('id', $id)->exists();

        // Verificar ambas condiciones y retornar mensajes apropiados
        if (!$usuarioExiste && !$registroExiste) {
            return response()->json([
                'message' => 'No se encontró el usuario y el registro especificados',
                'status_code' => 404
            ], 404);
        } elseif (!$usuarioExiste) {
            return response()->json([
                'message' => 'No se encontró el usuario especificado',
                'status_code' => 404
            ], 404);
        } elseif (!$registroExiste) {
            return response()->json([
                'message' => 'No se encontró el registro especificado',
                'status_code' => 404
            ], 404);
        }

        // Consultar el registro específico para el usuario
        $progresoUsuario = ProgresoUsuario::where('usuario_id', $usuario_id)
            ->where('id', $id)
            ->first();

        // Verificar si el registro existe para el usuario
        if (!$progresoUsuario) {
            return response()->json([
                'message' => 'No se encontró el registro especificado para el usuario',
                'status_code' => 404
            ], 404);
        }

        // Eliminar el registro
        $progresoUsuario->delete();

        // Retornar la respuesta de éxito
        return response()->json([
            'message' => 'Registro eliminado exitosamente',
            'status_code' => 200
        ], 200);
    }
}
