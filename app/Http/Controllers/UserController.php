<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Mail\UserSendNewPassword;
use App\Mail\UserSendWelcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;


class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_users')) {
            $users = User::with(['rol'])->orderBy('id', 'desc')->get();
            $roles = Rol::orderBy('name', 'asc')->get();
            $paises = Pais::orderBy('name', 'asc')->get();
            $departamentos = Departamento::orderBy('name', 'asc')->get();
            $municipios = Municipio::orderBy('name', 'asc')->get();
            return view('registrados.users.index', compact('users', 'roles', 'paises', 'departamentos', 'municipios'));
        } else {
            return redirect()->route('home');
        }
    }

    public function showRegisterForm()
    {
        $paises = Pais::orderBy('name', 'asc')->get();
        $departamentos = Departamento::orderBy('name', 'asc')->get();
        $municipios = Municipio::orderBy('name', 'asc')->get();
        return view('auth.register', compact('paises', 'departamentos', 'municipios'));
    }

    public function getDepartamentos($pais_id)
    {
        $departamentos = Departamento::where('pais_id', $pais_id)->orderBy('name', 'asc')->get();
        return response()->json($departamentos);
    }

    public function getMunicipios($departamento_id)
    {
        $municipios = Municipio::where('departamento_id', $departamento_id)->orderBy('name', 'asc')->get();
        return response()->json($municipios);
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email|max:50',
            'telefono' => 'required|max:8|unique:users',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no debe ser mayor a 50 caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.max' => 'El teléfono no debe ser mayor a 8 caracteres.',
            'telefono.unique' => 'El teléfono ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.'
        ]);

        // Si el país seleccionado es diferente a Guatemala (185), establecer departamento y municipio en null
        if ($request->pais_id != 185) {
            $request->merge([
                'departamento_id' => null,
                'municipio_id' => null
            ]);
        }

        $u = new User;
        $u->name = $request->name;
        $u->telefono = $request->telefono;
        $u->email = $request->email;
        $u->fecha_nacimiento = $request->fecha_nacimiento;
        $u->pais_id = $request->pais_id;
        $u->departamento_id = $request->departamento_id;
        $u->municipio_id = $request->municipio_id;
        $u->sexo = $request->sexo;
        $u->comunidad = $request->comunidad;
        $u->etnia = $request->etnia;
        $u->password = Hash::make($request->password);
        $u->role_id = $request->rol;
        $u->status = $request->status;

        if (Auth::check()) {
            // Registro manual / Administrador
            if (empty($u->agencia_id)) {
                $u->user_id = Auth::user()->id;
                $u->email_verified_at = now();
                $u->save();
                return back()->with('message', 'Usuario creado satisfactoriamente')->with('icon', 'success');
            }
        } else {
            // Registro manual / Usuario final
            if (empty($u->agencia_id)) {
                $u->user_id = 1;
                $u->save();
                Auth::login($u);
                return redirect()->route('misniveles')->with('message', 'Usuario creado ADMIN')->with('icon', 'success');
            }
        }
    }

    public function postEditUser(Request $request, $id)
    {
        $request->validate([
            'email' => 'nullable|email|max:50',
            'telefono' => 'required|max:8',
            'password' => 'nullable|min:8',
        ], [
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no debe ser mayor a 50 caracteres.',
            'telefono.max' => 'El teléfono no debe ser mayor a 8 caracteres.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        // Si el país seleccionado es diferente a Guatemala (185), establecer departamento y municipio en null
        if ($request->pais_id != 185) {
            $request->merge([
                'departamento_id' => null,
                'municipio_id' => null
            ]);
        }

        $u = User::findOrFail($id);
        $u->name = $request->name;
        $u->telefono = $request->telefono;
        $u->email = $request->email;
        $u->fecha_nacimiento = $request->fecha_nacimiento;
        $u->pais_id = $request->pais_id;
        $u->departamento_id = $request->departamento_id;
        $u->municipio_id = $request->municipio_id;
        $u->sexo = $request->sexo;
        $u->comunidad = $request->comunidad;
        $u->etnia = $request->etnia;

        if ($request->filled('password')) {
            $u->password = Hash::make($request->password);
        }

        $u->role_id = $request->rol;
        $u->save();

        return back()->with('message', 'Usuario actualizado satisfactoriamente')->with('icon', 'success');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $paises = Pais::all();
        $departamentos = $user->pais_id == 185 ? Departamento::where('pais_id', 185)->get() : collect();
        $municipios = $user->departamento_id ? Municipio::where('departamento_id', $user->departamento_id)->get() : collect();

        // Ajuste de la ruta de la vista
        return view('registrados.users.modals.edit', compact('user', 'paises', 'departamentos', 'municipios'));
    }

    public function deleteUser($id)
    {
        $u = User::findOrFail($id);
        $u->status = ($u->status == 1) ? 0 : 1;
        $message = ($u->status == 1) ? 'Usuario habilitado satisfactoriamente' : 'Usuario inhabilitado satisfactoriamente';
        $u->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
