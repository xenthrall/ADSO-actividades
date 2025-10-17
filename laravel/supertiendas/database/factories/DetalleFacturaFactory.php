<?php

namespace Database\Factories;

use App\Models\factura;
use App\Models\producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleFactura>
 */
class DetalleFacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $facturasIds = factura::pluck('id')->toArray();
        $productosIds = producto::where('estado', true)->pluck('id')->toArray();

        $cantidad = $this->faker->numberBetween(1, 5);
        $precioUnitario = $this->faker->randomFloat(2, 10, 500);
        $totalLinea = $cantidad * $precioUnitario;

        return [
            'idfactura' => $this->faker->randomElement($facturasIds),
            'idproducto' => $this->faker->randomElement($productosIds),
            'cantidad' => $cantidad,
            'preciounitario' => $precioUnitario,
            'totallinea' => $totalLinea,
        ];
    }
}
