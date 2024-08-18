<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
#use Illuminate\Support\Facades\Http;
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

    public function getMisNivelesUsuarioFinal(Request $request)
    {
        $niveles = Nivel::get();
        return view('registrados.index', compact('niveles'));
    }
}

