<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
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
            'pregunta_id.required' => 'El campo pregunta es obligatorio.',
            'pregunta_id.exists' => 'La pregunta seleccionada no es válida.',
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
            'texto_respuesta_preguntas.required' => 'El campo de respuesta de la pregunta es obligatorio.',
            'texto_respuesta_respuestas.required' => 'El campo de respuesta es obligatorio.',
            'status.required' => 'El campo status es obligatorio.',
            'status.boolean' => 'El valor de status debe ser 0 o 1.',
        ];

        try {
            // Validar los datos recibidos con mensajes personalizados
            $validated = $request->validate([
                'usuario_id' => 'required|exists:users,id',
                'pregunta_id' => 'required|exists:preguntas,id',
                'completado' => 'required|boolean',
                'intentos' => 'required|integer|min:0|max:3',
                'puntuacion' => 'required|integer|min:0|max:100',
                'estado_proceso' => 'required|integer|in:0,1',
                'texto_respuesta_preguntas' => 'required',
                'texto_respuesta_respuestas' => 'required',
                'status' => 'required|boolean',
            ], $messages);

            // Obtener la pregunta y su nivel_id
            $pregunta = Pregunta::findOrFail($validated['pregunta_id']);
            $validated['nivel_id_pregunta'] = $pregunta->nivel_id; // Asignar nivel_id a la columna

            // Determinar el estado final de la respuesta
            $validated['status_final_respuesta'] = $validated['texto_respuesta_preguntas'] === $validated['texto_respuesta_respuestas'];

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
            $progresoUsuario = ProgresoUsuario::with(['usuario','pregunta'])->findOrFail($id);

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
        $progresosUsuario = ProgresoUsuario::with(['usuario','pregunta'])
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
}
