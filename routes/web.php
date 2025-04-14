<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la aplicación. Estas rutas se cargan a través
| del RouteServiceProvider dentro de un grupo que contiene el middleware "web".
|
*/

// Página de Login/Registro (por defecto se muestra el formulario de login)
Route::get('/', [LoginController::class, 'loginForm'])->name('loginForm');

// Página para mostrar el formulario de Registro (con variable para activar el formulario de registro)
Route::get('/registro', [LoginController::class, 'registerForm'])->name('registerForm');

// Procesar login (Método POST)
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Procesar registro (Método POST)
Route::post('/register', [LoginController::class, 'register'])->name('register');

// Página de inicio después de login/registro exitoso
Route::get('/inicio', function () {
    return view('inicio'); // Asegúrate de tener la vista 'inicio.blade.php'
})->name('inicio');
