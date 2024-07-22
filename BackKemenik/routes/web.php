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
    Route::post('/Usuarios/Nuevo', [UserController::class, 'postUser'])->name('user-post');
    Route::post('/Usuarios/Editar/Usuario/{id}', [UserController::class, 'postEditUser'])->name('user-edit-post');
    Route::post('/Usuarios/Eliminar/Usuario/{id}', [UserController::class, 'deleteUser'])->name('user-delete');
    Route::post('/Usuarios/Permisos/Usuario/{id}', [UserController::class, 'permissionsUser'])->name('user-permissions-post');
    Route::post('/Recuperar/Contraseña/{email}', [UserController::class, 'sendRecoverPassword'])->name('recover-password');

    Route::get('/Roles', [RolController::class, 'getRoles'])->name('roles');
    Route::post('/Roles/Nuevo', [RolController::class, 'postRol'])->name('rol-post');
    Route::post('/Roles/Editar/Rol/{id}', [RolController::class, 'postEditRol'])->name('rol-edit-post');
});
