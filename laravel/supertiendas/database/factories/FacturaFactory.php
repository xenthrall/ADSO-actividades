<?php

namespace Database\Factories;

use App\Models\cliente;
use App\Models\estado;
use App\Models\paymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
   {
        $clientesIds = cliente::pluck('id')->toArray();
        $estadosIds = estado::pluck('id')->toArray();
        $metodosPagoIds = paymentMethod::where('activo', true)->pluck('id')->toArray();

        $subtotal = $this->faker->randomFloat(2, 50, 2000);
        $impuestos = $subtotal * 0.21; // 21% de IVA
        $total = $subtotal + $impuestos;

        return [
            'idcliente' => $this->faker->randomElement($clientesIds),
            'idestado' => $this->faker->randomElement($estadosIds),
            'fecha' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'idpago' => $this->faker->randomElement($metodosPagoIds),
            'subtotal' => $subtotal,
            'impuestos' => $impuestos,
            'total' => $total,
        ];
    }
}
