<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario administrador inicial
        DB::table('usuarios')->insert([
            'nombre'     => 'Administrador',
            'email'      => 'admin@salsamentaria.com',
            'password'   => Hash::make('password'),
            'rol'        => 'admin',
            'activo'     => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Categorías de ejemplo para una salsamentaria
        $categorias = [
            'Embutidos',
            'Quesos',
            'Carnes frías',
            'Enlatados',
            'Bebidas',
            'Condimentos',
            'Otros',
        ];

        foreach ($categorias as $nombre) {
            DB::table('categorias')->insert([
                'nombre'     => $nombre,
                'activo'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}