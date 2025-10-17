<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodosPago = [
            [
                'nombre' => 'Efectivo',
                'descripcion' => 'Pago en efectivo al momento de la entrega',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tarjeta de Crédito',
                'descripcion' => 'Pago con tarjeta de crédito',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tarjeta de Débito',
                'descripcion' => 'Pago con tarjeta de débito',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Transferencia Bancaria',
                'descripcion' => 'Pago mediante transferencia bancaria',
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'PayPal',
                'descripcion' => 'Pago a través de PayPal',
                'activo' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('payment_methods')->insert($metodosPago);
    }
}
