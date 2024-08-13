<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipanteController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ruta de dashboard, redirige según el rol del usuario
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->rol === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->rol === 'participante') {
            return redirect()->route('participante.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');
});

// Requerir las rutas de autenticación
require __DIR__.'/auth.php';

// Ruta del dashboard de administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    // Otras rutas de administrador
});

// Ruta del dashboard de participante
Route::middleware(['auth', 'participante'])->group(function () {
    Route::get('participante/dashboard', [ParticipanteController::class, 'index'])->name('participante.dashboard');


    Route::get('/nivel3', function() {
        return view('participante.Nivel-3.c_nivel3');
    })->name('nivel3');
    
    Route::get('/nivel1', function() {
        return view('participante.Nivel-1.nivel1');
    })->name('nivel1');
    
    
    Route::get('/nivel2', function() {
        return view('participante.Nivel-2.historia_nivel2');
    })->name('nivel2');
    
    // Otras rutas de participante
});


/*
route::get('admin/dashboard',[HomeController::class, 'index'])->
middleware(['auth','admin']);
*/
