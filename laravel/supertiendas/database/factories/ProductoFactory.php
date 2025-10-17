<?php

namespace Database\Factories;

use App\Models\categoria;
use App\Models\marca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener arrays de IDs existentes
        $categoriasIds = categoria::pluck('id')->toArray();
        $marcasIds = marca::pluck('id')->toArray();

        // Precios realistas para ropa y zapatos
        $precioVenta = $this->faker->randomFloat(2, 15, 300);
        $precioCompra = $precioVenta * $this->faker->randomFloat(2, 0.4, 0.7); // 40-70% del precio venta

        return [
            'nombre' => $this->generarNombreProducto(),
            'descripcion' => $this->faker->text(150),
            'precio' => $precioVenta,
            'preciocompra' => round($precioCompra, 2),
            'stock' => $this->faker->numberBetween(0, 200),
            'idcategoria' => $this->faker->randomElement($categoriasIds),
            'idmarca' => $this->faker->randomElement($marcasIds),
            'estado' => $this->faker->boolean(90), // 90% de probabilidad de estar activo
        ];
    }

    private function generarNombreProducto(): string
    {
        $tiposRopa = [
            'Camiseta', 'Polo', 'Camisa', 'Jeans', 'Pantalón', 'Short', 'Sudadera',
            'Chaqueta', 'Abrigo', 'Chaleco', 'Blusa', 'Vestido', 'Falda', 'Top',
            'Leggings', 'Joggers', 'Cardigan', 'Suéter', 'Hoodie', 'Parka'
        ];

        $tiposZapatos = [
            'Zapatillas', 'Botas', 'Sandalias', 'Zapatos', 'Mocasines', 'Tacones',
            'Alpargatas', 'Zuecos', 'Crocs', 'Botines', 'Chanclas', 'Deportivas',
            'Formales', 'Casuales', 'Especiales', 'Oxford', 'Derby', 'Salón'
        ];

        $materiales = [
            'Algodón', 'Poliéster', 'Lino', 'Seda', 'Lana', 'Cuero', 'Gamuza',
            'Jean', 'Pana', 'Lurex', 'Viscosa', 'Modal', 'Cashmere', 'Lona'
        ];

        $estilos = [
            'Básico', 'Clásico', 'Moderno', 'Vintage', 'Deportivo', 'Elegante',
            'Casual', 'Formal', 'Urbano', 'Hipster', 'Minimalista', 'Oversize',
            'Slim Fit', 'Regular Fit', 'Relaxed Fit', 'Skinny'
        ];

        $colores = [
            'Negro', 'Blanco', 'Azul', 'Rojo', 'Verde', 'Gris', 'Beige', 'Marrón',
            'Azul Marino', 'Rojo Bordeaux', 'Verde Oliva', 'Gris Antracita',
            'Beige Arena', 'Marrón Chocolate', 'Azul Cielo', 'Rojo Coral'
        ];

        $tipoProducto = $this->faker->randomElement([...$tiposRopa, ...$tiposZapatos]);
        $material = $this->faker->randomElement($materiales);
        $estilo = $this->faker->randomElement($estilos);
        $color = $this->faker->randomElement($colores);

        return "{$tipoProducto} {$material} {$estilo} {$color}";
    }
}
