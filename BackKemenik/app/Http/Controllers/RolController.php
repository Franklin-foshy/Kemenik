<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use Auth;

class RolController extends Controller
{
    public function getRoles(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_roles')) {
            $roles = Rol::get();
            $data = [
                'roles' => $roles
            ];
            return view('registrados.roles.index', $data);
        } else {
            return redirect()->route('home');
        }
    }

    public function postRol(Request $request)
    {
        $r = new Rol;
        $r->user_id = Auth::user()->id;
        $r->name = $request->input('name');
        $r->permissions = json_encode($request->except(['_token', 'name']));
        $r->save();

        return back()->with('message', 'Rol creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditRol(Request $request, $id)
    {
        $r = Rol::findOrFail($id);
        $r->name = $request->input('name');
        $r->permissions = json_encode($request->except(['_token', 'name']));
        $r->save();

        return back()->with('message', 'Rol actualizado satisfactoriamente')->with('icon', 'success');
    }
}
