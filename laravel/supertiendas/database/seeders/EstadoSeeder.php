<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'descripcion' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Confirmado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'En preparación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Enviado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Entregado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Cancelado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Reembolsado',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('estados')->insert($estados);
    }
}
