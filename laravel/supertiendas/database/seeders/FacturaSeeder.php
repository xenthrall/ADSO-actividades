<?php

namespace Database\Seeders;

use App\Models\factura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar dependencias
        if (\App\Models\Cliente::count() === 0) {
            $this->call(ClienteSee::class);
        }

        if (\App\Models\Estado::count() === 0) {
            $this->call(EstadoSeeder::class);
        }

        if (\App\Models\PaymentMethod::count() === 0) {
            $this->call(PaymentMethodSeeder::class);
        }

        $this->command->info('Generando 500 facturas...');

        // Crear 500 facturas en lotes
        $lotes = 5;
        $facturasPorLote = 100;

        for ($i = 0; $i < $lotes; $i++) {
            factura::factory()->count($facturasPorLote)->create();

            $progreso = (($i + 1) * $facturasPorLote);
            $this->command->info("{$progreso}/500 facturas creadas...");
        }

        $this->command->info('¡500 facturas creadas exitosamente!');
    }
}
