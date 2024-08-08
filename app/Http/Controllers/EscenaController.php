<?php

namespace App\Http\Controllers;

use App\Models\Escena;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscenaController extends Controller
{
    public function getEscenas(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_escenas')) {
            $escenas = Escena::get();
            $nivels = Nivel::orderBy('name', 'asc')->get();
            return view('registrados.escenas.index', compact('escenas', 'nivels'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postescena(Request $request)
    {

        $e = new Escena();
        $e->descripcion = $request->input('descripcion');
        $e->nivel_id = $request->input('nivel_id');
        $e->save();

        return back()->with('message', 'Escena creada satisfactoriamente')->with('icon', 'success');
    }

    public function postEditEscena(Request $request, $id)
    {
        $e = Escena::findOrFail($id);
        $e->descripcion = $request->input('descripcion');
        $e->nivel_id = $request->input('nivel_id');
        $e->save();

        return back()->with('message', 'Escena actualizada satisfactoriamente')->with('icon', 'success');
    }

    public function deleteEscena($id)
    {
        $e = Escena::findOrFail($id);
        $e->status = ($e->status == 1) ? 0 : 1;
        $message = ($e->status == 1) ? 'Escena habilitada satisfactoriamente' : 'Escena inhabilitada satisfactoriamente';
        $e->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
