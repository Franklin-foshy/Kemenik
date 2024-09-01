<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ProgresoUsuario;
use App\Models\ProgresoDosUsuario;
use App\Models\ProgresoTresUsuario;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class NivelController extends Controller
{
    public function getNivels(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_niveles')) {
            $niveles = Nivel::get();
            return view('registrados.niveles.index', compact('niveles'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postNivel(Request $request)
    {
        $n = new Nivel;
        $n->name = $request->input('name');
        $n->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('niveles'), $imageName);
            $n->imagen = $imageName;
        }

        $n->save();

        return back()->with('message', 'Nivel creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditNivel(Request $request, $id)
    {
        $n = Nivel::findOrFail($id);
        $n->name = $request->input('name');
        $n->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($n->imagen && File::exists(public_path('niveles/' . $n->imagen))) {
                File::delete(public_path('niveles/' . $n->imagen));
            }

            // Guardar la nueva imagen
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('niveles'), $imageName);
            $n->imagen = $imageName;
        }

        $n->save();

        return back()->with('message', 'Nivel actualizado satisfactoriamente')->with('icon', 'success');
    }

    public function deleteNivel($id)
    {
        $n = Nivel::findOrFail($id);
        $n->status = ($n->status == 1) ? 0 : 1;
        $message = ($n->status == 1) ? 'Nivel habilitado satisfactoriamente' : 'Nivel inhabilitado satisfactoriamente';
        $n->save();
        return back()->with('message', $message)->with('icon', 'success');
    }

    public function ResultadoNiveles()
    {

        # OBTIENE LOS NIVELES VISTA USUARIO FINAL
        $niveles = Nivel::get();



        # GRAFICAS CARDS
        // Contar registros únicos por usuario_id, nivel_id_pregunta y estado_proceso = 1 para nivel 1
        $nivelUnoFin = ProgresoUsuario::where('nivel_id_pregunta', 1)
            ->where('estado_proceso', 1)
            ->distinct('usuario_id')
            ->count('usuario_id');

        // Contar registros únicos por usuario_id, nivel_id_pregunta y estado_proceso = 1 para nivel 2
        $nivelDosFin = ProgresoDosUsuario::where('nivel_id_pregunta', 2)
            ->where('estado_proceso', 1)
            ->distinct('usuario_id')
            ->count('usuario_id');

        // Contar registros únicos por usuario_id, nivel_id_pregunta y estado_proceso = 1 para nivel 3
        $nivelTresFin = ProgresoTresUsuario::where('nivel_id_pregunta', 3)
            ->where('estado_proceso', 1)
            ->distinct('usuario_id')
            ->count('usuario_id');



        # GRAFICA DE PASTEL
        // Contar registros por nivel_id_pregunta 1,2 y 3
        $nivelUnoGen = ProgresoUsuario::where('nivel_id_pregunta', 1)
            ->count();

        $nivelDosGen = ProgresoDosUsuario::where('nivel_id_pregunta', 2)
            ->count();

        $nivelTresGen = ProgresoTresUsuario::where('nivel_id_pregunta', 3)
            ->count();



        # GRAFICA DE BARRAS
        // Obtener el total de usuarios registrados
        $totalUsuarios = User::count();

        // Obtener la cantidad de usuarios por departamento y el nombre del departamento
        $usuariosPorDepartamento = User::select('departamento_id', DB::raw('count(*) as total'))
            ->groupBy('departamento_id')
            ->with('departamento:id,name') // Cargar el nombre del departamento
            ->get();

        // Retornar los contadores a la vista
        return view('registrados.index', compact('niveles', 'nivelUnoFin', 'nivelDosFin', 'nivelTresFin', 'nivelUnoGen', 'nivelDosGen', 'nivelTresGen', 'totalUsuarios', 'usuariosPorDepartamento'));
    }
}
