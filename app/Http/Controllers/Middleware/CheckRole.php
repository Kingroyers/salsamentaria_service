<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Uso en rutas:
     *   ->middleware('role:admin')
     *   ->middleware('role:cajero')
     *   ->middleware('role:admin,cajero')  ← acepta ambos roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        // Si no está logueado, manda al login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $usuario = Auth::user();

        // Si el usuario está inactivo, lo desloguea
        if (!$usuario->activo) {
            Auth::logout();
            return redirect()->route('login')
                ->withErrors(['email' => 'Tu cuenta está desactivada. Contacta al administrador.']);
        }

        // Verifica si el rol del usuario está entre los permitidos
        if (!in_array($usuario->rol, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}