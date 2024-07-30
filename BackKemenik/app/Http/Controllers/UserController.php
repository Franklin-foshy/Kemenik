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


class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_users')) {
            $users = User::with(['rol'])->orderBy('id', 'desc')->get();
            $roles = Rol::orderBy('name', 'asc')->get();
            return view('registrados.users.index', compact('users', 'roles'));
        } else {
            return redirect()->route('home');
        }
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

        //dd($request->all());

        $u = new User;
        $u->name = $request->name;
        $u->telefono = $request->telefono;
        $u->email = $request->email;
        $u->fecha_nacimiento = $request->fecha_nacimiento;
        $u->departamento = $request->departamento;
        $u->sexo = $request->sexo;
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

        $u = User::findOrFail($id);
        $u->name = $request->name;
        $u->telefono = $request->telefono;
        $u->email = $request->email;
        $u->fecha_nacimiento = $request->fecha_nacimiento;
        $u->departamento = $request->departamento;
        $u->sexo = $request->sexo;

        if ($request->filled('password')) {
            $u->password = Hash::make($request->password);
        }

        $u->role_id = $request->rol;
        $u->save();

        return back()->with('message', 'Usuario actualizado satisfactoriamente')->with('icon', 'success');
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
