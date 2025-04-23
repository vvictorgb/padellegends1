<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function loginForm()
    {

        return view('Auth.loginRegister', ['showRegister' => false]);
    }


    public function registerForm()
    {
        return view('Auth.loginRegister', ['showRegister' => true]);
    }


    public function login(Request $request)
    {

        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {

            return redirect()->route('inicio');
        } else {

            return view('Auth.loginRegister', ['error' => 'Usuario o contraseña incorrectos', 'showRegister' => false]);
        }
    }


    public function register(Request $request)
{

    $validator = Validator::make($request->all(), [
        'name'          => 'required|string|max:255',
        'email'         => 'required|string|email|max:255|unique:users,email',
        'movil'         => 'required|string|max:15',
        'direccion'     => 'required|string|max:255',
        'sexo'          => 'required|in:masculino,femenino,otro',
        'lado'          => 'required|in:derecha,revés,ambos',
        'password'      => 'required|string|confirmed|min:8',
    ]);

    if ($validator->fails()) {

        return redirect()->route('registerForm')
            ->withErrors($validator)
            ->withInput();
    }


    $usuario = new User();
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->movil = $request->input('movil');
    $usuario->direccion = $request->input('direccion');
    $usuario->sexo = $request->input('sexo');
    $usuario->lado = $request->input('lado');
    $usuario->password = Hash::make($request->input('password'));
    $usuario->save();


    Auth::login($usuario);


    return redirect()->route('inicio');
}

}
