<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{




    public function show()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para ver el perfil');
        }

        return view('perfil', compact('user'));
    }

    // Mostrar formulario de edición del usuario autenticado
    public function edit()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para editar tu perfil');
        }

        return view('editar_usuario', compact('user'));
    }

    // Actualizar la información del usuario autenticado
    public function update(Request $request)
{
    $user = Auth::user();
    if (!$user) {
        return redirect('/login')->with('error', 'Debes iniciar sesión para actualizar tu perfil');
    }

    // Validación
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6',
        'movil' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'sexo' => 'nullable|in:masculino,femenino',
    ]);

    // Actualización de datos
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }
    $user->movil = $request->movil;
    $user->direccion = $request->direccion;
    $user->sexo = $request->sexo;

    $user->save();

    return redirect()->route('users.show')->with('success', 'Perfil actualizado correctamente');
}


    // Eliminar el usuario autenticado
    public function destroy()
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para eliminar tu cuenta');
        }

        // Eliminar al usuario
        $user->delete();

        // Redirigir al inicio con un mensaje de éxito
        return redirect('/')->with('success', 'Usuario eliminado correctamente');
    }
}
