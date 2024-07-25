<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Respuesta;
use App\Models\Pregunta;
use Illuminate\Support\Facades\File;

class RespuestaController extends Controller
{
    public function getMisRespuestas(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_respuestas')) {
            $respuestas = Respuesta::get();
            $preguntas = Pregunta::orderBy('texto_pregunta', 'asc')->get();
            return view('registrados.respuestas.index', compact('respuestas', 'preguntas'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postRespuesta(Request $request)
    {

        $r = new Respuesta;
        $r->pregunta_id = $request->input('pregunta_id');
        $r->texto_respuesta = $request->input('texto_respuesta');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('respuestas'), $imageName);
            $r->imagen = $imageName;
        }

        $r->save();

        return back()->with('message', 'Respuesta creada satisfactoriamente')->with('icon', 'success');
    }

    public function postEditRespuesta(Request $request, $id)
    {
        $r = Respuesta::findOrFail($id);
        $r->pregunta_id = $request->input('pregunta_id');
        $r->texto_respuesta = $request->input('texto_respuesta');

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($r->imagen && File::exists(public_path('respuestas/' . $r->imagen))) {
                File::delete(public_path('respuestas/' . $r->imagen));
            }

            // Guardar la nueva imagen
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('respuestas'), $imageName);
            $r->imagen = $imageName;
        }

        $r->save();

        return back()->with('message', 'Respuesta actualizada satisfactoriamente')->with('icon', 'success');
    }

    public function deleteRespuesta($id)
    {
        $r = Respuesta::findOrFail($id);
        $r->status = ($r->status == 1) ? 0 : 1;
        $message = ($r->status == 1) ? 'Respuesta habilitada satisfactoriamente' : 'Respuesta habilitada satisfactoriamente';
        $r->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
