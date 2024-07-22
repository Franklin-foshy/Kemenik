<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Verificar si el usuario está inactivo
        if ($user->status == 0) {
            Auth::logout(); // Cerrar sesión si el usuario está inactivo
            return redirect()->route('login')->with('message', 'Tu cuenta está inactiva, por favor contacta al administador')->with('icon', 'error');
        }

        // Si el usuario está activo, puedes realizar otras acciones aquí si es necesario
        return redirect()->intended($this->redirectPath())->with('message', 'Bienvenido!')->with('icon', 'success');
    }
}
