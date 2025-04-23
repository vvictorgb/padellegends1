<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdminPartidaController;
use App\Http\Controllers\RankingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la aplicación. Estas rutas se cargan a través
| del RouteServiceProvider dentro de un grupo que contiene el middleware "web".
|
*/


Route::get('/login', [LoginController::class, 'loginForm'])->name('loginForm');


Route::get('/registro', [LoginController::class, 'registerForm'])->name('registerForm');


Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::post('/register', [LoginController::class, 'register'])->name('register');


Route::get('/', function () {
    return view('inicio');
})->name('inicio');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');






Route::get('/perfil', [UserController::class, 'show'])->name('users.show');
Route::get('/editar-perfil', [UserController::class, 'edit'])->name('users.edit');
Route::put('/editar-perfil', [UserController::class, 'update'])->name('users.update');
Route::delete('/eliminar-perfil', [UserController::class, 'destroy'])->name('users.destroy');



Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservas/dia', [ReservaController::class, 'reservasPorDia'])->name('reservas.dia');


Route::post('/reservas/unirse', [ReservaController::class, 'unirseAPartida'])->name('reservas.unirse');
Route::post('/reservas/reservar', [ReservaController::class, 'reservarEntera'])->name('reservas.reservar');





Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/partidas', [AdminPartidaController::class, 'index'])->name('admin.partidas');
    Route::post('/admin/partidas/marcar-resultado', [AdminPartidaController::class, 'marcarResultado'])->name('admin.marcarResultado');
});




Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');
