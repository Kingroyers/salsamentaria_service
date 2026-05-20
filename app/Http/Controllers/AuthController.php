<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLogin()
    {
        // Si ya está logueado, redirige directo
        if (Auth::check()) {
            return $this->redirigirSegunRol();
        }

        return view('auth.login');
    }

    // Procesa el formulario de login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'El correo es obligatorio.',
            'email.email'       => 'Ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min'      => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            // Actualiza la fecha del último acceso
            Auth::user()->update(['ultimo_acceso' => now()]);

            return $this->redirigirSegunRol();
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Correo o contraseña incorrectos.']);
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Redirige según el rol del usuario logueado
    private function redirigirSegunRol()
    {
        return Auth::user()->esAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('pos.index');
    }
}
