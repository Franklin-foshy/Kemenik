<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rompecabeza;
use App\Models\Nivel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class RompecabezaController extends Controller
{
    public function getMisRompecabezas(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_rompecabezas')) {
            $rompecabezas = Rompecabeza::get();
            $nivels = Nivel::orderBy('name', 'asc')->get();
            return view('registrados.rompecabezas.index', compact('rompecabezas', 'nivels'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postRompecabeza(Request $request)
    {

        $r = new Rompecabeza();
        $r->name = $request->input('name');
        $r->nivel_id = $request->input('nivel_id');

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('rompecabezas'), $imageName);
            $r->imagen = $imageName;
        }

        $r->save();

        return back()->with('message', 'Rompecabeza creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditRompecabeza(Request $request, $id)
    {
        $r = Rompecabeza::findOrFail($id);
        $r->name = $request->input('name');
        $r->nivel_id = $request->input('nivel_id');

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($r->imagen && File::exists(public_path('rompecabezas/' . $r->imagen))) {
                File::delete(public_path('rompecabezas/' . $r->imagen));
            }

            // Guardar la nueva imagen
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('rompecabezas'), $imageName);
            $r->imagen = $imageName;
        }

        $r->save();

        return back()->with('message', 'Rompecabeza actualizada satisfactoriamente')->with('icon', 'success');
    }

    public function deleteRompecabeza($id)
    {
        $r = Rompecabeza::findOrFail($id);
        $r->status = ($r->status == 1) ? 0 : 1;
        $message = ($r->status == 1) ? 'Rompecabeza habilitada satisfactoriamente' : 'Rompecabeza inhabilitada satisfactoriamente';
        $r->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
