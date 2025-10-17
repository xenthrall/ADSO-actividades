<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            [
                'nombre' => 'Nike',
                'descripcion' => 'Marca deportiva líder en calzado y ropa deportiva',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Adidas',
                'descripcion' => 'Marca alemana especializada en calzado y ropa deportiva',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Zara',
                'descripcion' => 'Cadena de moda española con tendencias actuales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'H&M',
                'descripcion' => 'Tienda de moda sueca con precios accesibles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Levi\'s',
                'descripcion' => 'Fabricante estadounidense de jeans y ropa casual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Puma',
                'descripcion' => 'Marca deportiva alemana de calzado y ropa',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('marcas')->insert($marcas);
    }
}
