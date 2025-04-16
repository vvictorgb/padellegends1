<?php

use App\Http\Controllers\ContactController;
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


Route::get('/', [LoginController::class, 'loginForm'])->name('loginForm');


Route::get('/registro', [LoginController::class, 'registerForm'])->name('registerForm');


Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::post('/register', [LoginController::class, 'register'])->name('register');


Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
