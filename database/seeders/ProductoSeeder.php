<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            ['codigo' => 'EMB-001', 'nombre' => 'Salchichón Cervecero',   'categoria' => 'Embutidos', 'precio' => 12500, 'stock' => 30],
            ['codigo' => 'EMB-002', 'nombre' => 'Chorizo Español',        'categoria' => 'Embutidos', 'precio' => 9800,  'stock' => 25],
            ['codigo' => 'EMB-003', 'nombre' => 'Jamón Serrano',          'categoria' => 'Embutidos', 'precio' => 18000, 'stock' => 0],
            ['codigo' => 'QUE-001', 'nombre' => 'Queso Doble Crema',      'categoria' => 'Quesos',    'precio' => 8500,  'stock' => 15],
            ['codigo' => 'QUE-002', 'nombre' => 'Queso Mozzarella',       'categoria' => 'Quesos',    'precio' => 11200, 'stock' => 8],
            ['codigo' => 'CAR-001', 'nombre' => 'Lomo de Cerdo',          'categoria' => 'Carnes',    'precio' => 22000, 'stock' => 12],
            ['codigo' => 'CAR-002', 'nombre' => 'Pechuga de Pollo x kg',  'categoria' => 'Carnes',    'precio' => 14500, 'stock' => 20],
            ['codigo' => 'ENC-001', 'nombre' => 'Atún en Aceite x2',      'categoria' => 'Enlatados', 'precio' => 6900,  'stock' => 50],
            ['codigo' => 'ENC-002', 'nombre' => 'Sardinas en Salsa',      'categoria' => 'Enlatados', 'precio' => 4200,  'stock' => 3],
        ];

        DB::table('productos')->insert($productos);
    }
}