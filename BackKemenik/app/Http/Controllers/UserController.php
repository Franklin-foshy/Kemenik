<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use App\Models\Agencia;
use App\Mail\UserSendNewPassword;
use App\Mail\UserSendWelcome;
use Hash, Auth, Config, Str, Mail;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        if (kvfj(Auth::user()->rol->permissions, 'get_users')) {
            $users = User::with(['rol'])->orderBy('id', 'desc')->get();
            $roles = Rol::orderBy('name', 'asc')->get();
            $agencias = Agencia::orderBy('name', 'asc')->get();
            return view('registrados.users.index', compact('users', 'roles', 'agencias'));
        } else {
            return redirect()->route('home');
        }
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        //dd($request->all());

        $u = new User;
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->role_id = $request->rol;

        $r = Rol::where('id', $request->rol)->first();
        $u->permissions = $r->permissions;

        $u->status = $request->status;

        //Registro manual / Usuario final
        if (empty($u->agencia_id)) {
            $u->user_id = 1;
            $u->save();
            Auth::login($u);
            return redirect()->route('home')->with('message', 'Usuario creado satisfactoriamente')->with('icon', 'success');
        }

        //Registro manual / Adminstrador
        else {
            $u->user_id = Auth::user()->id;
            $u->save();
            $u->email_verified_at = now();
            return back()->with('message', 'Usuario creado satisfactoriamente')->with('icon', 'success');
        }
    }

    public function postEditUser(Request $request, $id)
    {
        $u = User::findOrFail($id);
        $u->name = $request->name;
        $u->username = $request->username;
        $u->email = $request->email;
        if ($request->password) {
            $u->password = Hash::make($request->password);
        }
        $u->agencia_id = $request->agencia;
        $u->role_id = $request->rol;

        $r = Rol::where('id', $request->rol)->first();
        $u->permissions = $r->permissions;

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

    public function permissionsUser(Request $request, $id)
    {
        $u = User::findOrFail($id);
        $u->permissions = json_encode($request->except(['_token']));
        $u->save();
        return back()->with('message', 'Permisos actualizados satisfactoriamente')->with('icon', 'success');
    }

    public function sendRecoverPassword($email)
    {
        $user = User::where('email', $email)->first();

        $new_password = Str::random(8);
        $user->password = Hash::make($new_password);
        $user->save();

        $data = [
            'user' => $user,
            'password' => $new_password
        ];

        $send = [$user->email];

        Mail::to($send)->send(new UserSendNewPassword($data));
        return back()->with('message', 'Contraseña reestablecida satisfactoriamente')->with('icon', 'success');
    }
}
