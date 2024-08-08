<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'telefono' => ['required', 'numeric', 'digits:8'],
            'password' => ['required'],
        ]);

        $user = User::where('telefono', $credentials['telefono'])->first();

        if ($user && $user->status == 0) {
            return back()->withErrors([
                'telefono' => 'Tu cuenta está inactiva. Por favor, contacta al administrador.',
            ]);
        }

        if (Auth::attempt(['telefono' => $credentials['telefono'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'telefono' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
