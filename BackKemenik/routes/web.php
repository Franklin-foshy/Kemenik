<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;

// Ruta, página inicial al levantar el sistema 
Route::get('/', function () {
    return view('welcome');
});

//verificación de contraseña
Auth::routes(['verify' => true]);

// Ruta, Valida inicio de sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

// Ruta, Valida inicio de sesión al registrarse manualmente desde App 
Route::post('/register', [UserController::class, 'postUser'])->name('user-register');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/Usuarios', [UserController::class, 'getUsers'])->name('users');
    Route::get('/Roles', [RolController::class, 'getRoles'])->name('roles');
});
