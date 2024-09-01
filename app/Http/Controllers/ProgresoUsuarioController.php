<?php

namespace App\Http\Controllers;

use App\Models\ProgresoDosUsuario;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresoUsuarioController extends Controller
{
    public function getProgresoUsuarioUno()
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario')) {
            $progresoUsuarios = ProgresoUsuario::get();
            return view('registrados.progresoUsuarios.progresouno', compact('progresoUsuarios'));
        } else {
            return redirect()->route('home');
        }
    }

    public function getProgresoUsuarioDos()
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario')) {
            $progresoDosUsuarios = ProgresoDosUsuario::get();
            return view('registrados.progresoUsuarios.progresodos', compact('progresoDosUsuarios'));
        } else {
            return redirect()->route('home');
        }
    }
}
