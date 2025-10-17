<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Ropa Hombre',
                'descripcion' => 'Prendas de vestir para hombre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ropa Mujer',
                'descripcion' => 'Prendas de vestir para mujer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zapatos Hombre',
                'descripcion' => 'Calzado para hombre',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zapatos Mujer',
                'descripcion' => 'Calzado para mujer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Accesorios',
                'descripcion' => 'Complementos y accesorios de moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Deportivo',
                'descripcion' => 'Ropa y calzado para actividades deportivas',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('categorias')->insert($categorias);
    }
}
