<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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


Route::get('/', [LoginController::class, 'loginForm'])->name('loginForm');


Route::get('/registro', [LoginController::class, 'registerForm'])->name('registerForm');


Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::post('/register', [LoginController::class, 'register'])->name('register');


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');






Route::get('/perfil', [UserController::class, 'show'])->name('users.show');
Route::get('/editar-perfil', [UserController::class, 'edit'])->name('users.edit');
Route::put('/editar-perfil', [UserController::class, 'update'])->name('users.update');
Route::delete('/eliminar-perfil', [UserController::class, 'destroy'])->name('users.destroy');
