<?php

namespace App\Http\Controllers;

use App\Models\ProgresoDosUsuario;
use App\Models\ProgresoTresUsuario;
use App\Models\ProgresoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresoUsuarioController extends Controller
{
    public function getProgresoUsuarioUno()
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario')) {
            // Cargar la relación 'pregunta' para acceder a 'texto_pregunta'
            $progresoUsuarios = ProgresoUsuario::with('pregunta')->get();
            return view('registrados.progresoUsuarios.progresouno', compact('progresoUsuarios'));
        } else {
            return redirect()->route('home');
        }
    }

    public function getProgresoUsuarioDos()
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario')) {
            $progresoDosUsuarios = ProgresoDosUsuario::with('ppregunta')->get();
            return view('registrados.progresoUsuarios.progresodos', compact('progresoDosUsuarios'));
        } else {
            return redirect()->route('home');
        }
    }

    public function getProgresoUsuarioTres()
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario')) {
            $progresoTresUsuarios = ProgresoTresUsuario::with('pregunta')->get();
            return view('registrados.progresoUsuarios.progresotres', compact('progresoTresUsuarios'));
        } else {
            return redirect()->route('home');
        }
    }
}
