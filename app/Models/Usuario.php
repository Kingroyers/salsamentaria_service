<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
        'activo',
        'ultimo_acceso',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'ultimo_acceso' => 'datetime',
        'activo'        => 'boolean',
    ];

    // Verifica si el usuario es administrador
    public function esAdmin(): bool
    {
        return $this->rol === 'admin';
    }

    // Verifica si el usuario es cajero
    public function esCajero(): bool
    {
        return $this->rol === 'cajero';
    }
}