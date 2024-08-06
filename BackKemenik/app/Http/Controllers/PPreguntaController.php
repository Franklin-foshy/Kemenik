<?php

namespace App\Http\Controllers;

use App\Models\Escena;
use App\Models\Nivel;
use App\Models\PPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PPreguntaController extends Controller
{
    public function getPPreguntas(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_ppreguntas')) {
            $ppreguntas = PPregunta::get();
            $nivels = Nivel::orderBy('name', 'asc')->get();
            $escenas = Escena::orderBy('descripcion', 'asc')->get();
            return view('registrados.ppreguntas.index', compact('ppreguntas', 'nivels', 'escenas'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postPPregunta(Request $request)
    {

        $p = new PPregunta();
        $p->nivel_id = $request->input('nivel_id');
        $p->escena_id = $request->input('escena_id');
        $p->nombre = $request->input('nombre');
        $p->texto_pregunta = $request->input('texto_pregunta');
        $p->texto_respuesta = $request->input('texto_respuesta');
        $p->save();

        return back()->with('message', 'Pregunta Persona creada satisfactoriamente')->with('icon', 'success');
    }

    public function postEditPPregunta(Request $request, $id)
    {
        $p = PPregunta::findOrFail($id);
        $p->nivel_id = $request->input('nivel_id');
        $p->escena_id = $request->input('escena_id');
        $p->nombre = $request->input('nombre');
        $p->texto_pregunta = $request->input('texto_pregunta');
        $p->texto_respuesta = $request->input('texto_respuesta');
        $p->save();

        return back()->with('message', 'Pregunta Persona actualizada satisfactoriamente')->with('icon', 'success');
    }

    public function deletePPregunta($id)
    {
        $p = PPregunta::findOrFail($id);
        $p->status = ($p->status == 1) ? 0 : 1;
        $message = ($p->status == 1) ? 'Pregunta Persona habilitada satisfactoriamente' : 'Pregunta Persona inhabilitada satisfactoriamente';
        $p->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
