<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Importa el facade Validator

class LoginController extends Controller
{
    // Muestra la vista de login y registro (por defecto, formulario de login)
    public function loginForm()
    {
        // La variable 'showRegister' se establece como false para mostrar el formulario de login
        return view('Auth.loginRegister', ['showRegister' => false]);
    }

    // Muestra la vista para el registro (con el formulario de registro visible)
    public function registerForm()
    {
        return view('Auth.loginRegister', ['showRegister' => true]);
    }

    // Método para el login
    public function login(Request $request)
    {
        // Se obtienen las credenciales: email y password
        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            // Si las credenciales son correctas, redirige al inicio
            return redirect()->route('inicio');
        } else {
            // Si las credenciales son incorrectas, retorna la vista con un error;
            // aquí usamos 'showRegister' => false para mostrar el formulario de login.
            return view('Auth.loginRegister', ['error' => 'Usuario o contraseña incorrectos', 'showRegister' => false]);
        }
    }

    // Método para el registro de nuevos usuarios
    public function register(Request $request)
{
    // Se valida manualmente para tener control sobre la redirección en caso de error.
    $validator = Validator::make($request->all(), [
        'name'          => 'required|string|max:255',
        'email'         => 'required|string|email|max:255|unique:users,email',
        'movil'         => 'required|string|max:15', // Agregar validación para móvil (puedes ajustarlo según lo que necesites)
        'direccion'     => 'required|string|max:255',
        'sexo'          => 'required|in:masculino,femenino,otro',
        'lado'          => 'required|in:derecha,revés,ambos',
        'password'      => 'required|string|confirmed|min:8',
    ]);

    if ($validator->fails()) {
        // Si la validación falla, redirige a la ruta de registro (GET) con los errores y los inputs viejos.
        return redirect()->route('registerForm')
            ->withErrors($validator)
            ->withInput();
    }

    // Si la validación pasa, se crea el nuevo usuario.
    $usuario = new User();
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->movil = $request->input('movil'); // Guardar el móvil
    $usuario->direccion = $request->input('direccion'); // Guardar la dirección
    $usuario->sexo = $request->input('sexo'); // Guardar el sexo
    $usuario->lado = $request->input('lado'); // Guardar el lado
    $usuario->password = Hash::make($request->input('password')); // Encriptar la contraseña
    $usuario->save();

    // Iniciar sesión automáticamente después del registro
    Auth::login($usuario);

    // Redirigir al inicio
    return redirect()->route('inicio');
}

}
