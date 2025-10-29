<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Muestra la vista del perfil del usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user();
        return view('perfil.index', compact('user'));
    }

    /**
     * Actualiza los datos del usuario.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Actualizar datos básicos
        $user->name = $request->name;
        $user->email = $request->email;

        // Si el usuario cambia la contraseña
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil.index')
            ->with('success', 'Tu perfil ha sido actualizado correctamente.');
    }
}
