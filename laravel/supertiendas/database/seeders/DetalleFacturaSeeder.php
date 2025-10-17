<?php

namespace Database\Seeders;

use App\Models\detallefactura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
        // Verificar que existen facturas
        if (\App\Models\Factura::count() === 0) {
            $this->call(FacturaSeeder::class);
        }

        if (\App\Models\Producto::count() === 0) {
            $this->call(ProductoSeeder::class);
        }

        $this->command->info('Generando 2000 detalles de factura...');

        // Crear 2000 detalles usando Factory
        $this->crearDetallesConFactory();

        // Actualizar los totales de las facturas
        $this->actualizarTotalesFacturas();

        $this->command->info('¡2000 detalles de factura creados exitosamente!');
    }

    private function crearDetallesConFactory(): void
    {
        $lotes = 8;
        $detallesPorLote = 250;

        for ($i = 0; $i < $lotes; $i++) {
            detallefactura::factory()->count($detallesPorLote)->create();

            $progreso = (($i + 1) * $detallesPorLote);
            $this->command->info("{$progreso}/2000 detalles creados...");
        }
    }

    private function actualizarTotalesFacturas(): void
    {
        $this->command->info('Actualizando totales de facturas...');

        // Obtener todas las facturas que tienen detalles
        $facturasConDetalles = DB::table('detalle_facturas')
            ->select('idfactura',
                     DB::raw('SUM(totallinea) as subtotal'),
                     DB::raw('COUNT(*) as items'))
            ->groupBy('idfactura')
            ->get();

        foreach ($facturasConDetalles as $factura) {
            $subtotal = $factura->subtotal;
            $impuestos = $subtotal * 0.21; // 21% IVA
            $total = $subtotal + $impuestos;

            DB::table('facturas')
                ->where('id', $factura->idfactura)
                ->update([
                    'subtotal' => $subtotal,
                    'impuestos' => $impuestos,
                    'total' => $total,
                    'updated_at' => now()
                ]);
        }

        $this->command->info('Totales de facturas actualizados correctamente.');
    }
}
