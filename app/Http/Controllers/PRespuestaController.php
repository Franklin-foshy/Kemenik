<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PRespuesta;
use App\Models\PPregunta;

class PRespuestaController extends Controller
{
    public function getPRespuestas(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_prespuestas')) {
            $prespuestas = PRespuesta::get();
            $ppreguntas = PPregunta::orderBy('nivel_id', 'asc')->get();
            return view('registrados.prespuestas.index', compact('prespuestas', 'ppreguntas'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postPRespuesta(Request $request)
    {

        $r = new PRespuesta();
        $r->ppregunta_id = $request->input('ppregunta_id');
        $r->nombre = $request->input('nombre');
        $r->texto_respuesta = $request->input('texto_respuesta');
        $r->save();

        return back()->with('message', 'Personaje respuesta creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditPRespuesta(Request $request, $id)
    {
        $r = PRespuesta::findOrFail($id);
        $r->nombre = $request->input('nombre');
        $r->ppregunta_id = $request->input('ppregunta_id');
        $r->texto_respuesta = $request->input('texto_respuesta');
        $r->save();

        return back()->with('message', 'Personaje respuesta actualizado satisfactoriamente')->with('icon', 'success');
    }

    public function deletePRespuesta($id)
    {
        $p = PRespuesta::findOrFail($id);
        $p->status = ($p->status == 1) ? 0 : 1;
        $message = ($p->status == 1) ? 'Personaje respuesta habilitado satisfactoriamente' : 'Personaje respuesta inhabilitado satisfactoriamente';
        $p->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
