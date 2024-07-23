<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Support\Facades\Auth;

class NivelController extends Controller
{
    public function getNiveles(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_niveles')) {
            $niveles = Nivel::get();
            $data = [
                'niveles' => $niveles
            ];
            return view('registrados.niveles.index', $data);
        } else {
        }
        return redirect()->route('home');
    }

    public function postNivel(Request $request)
    {
        $n = new Nivel;
        $n->name = $request->input('name');
        $n->descripcion = $request->input('descripcion');
        $n->save();

        return back()->with('message', 'Nivel creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditNivel(Request $request, $id)
    {
        $n = Nivel::findOrFail($id);
        $n->name = $request->input('name');
        $n->descripcion = $request->input('descripcion');
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
}

