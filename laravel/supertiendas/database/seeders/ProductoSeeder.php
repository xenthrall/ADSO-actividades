<?php

namespace Database\Seeders;

use App\Models\producto;
use Database\Factories\ProductoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
      {
        // Verificar que existen categorías y marcas
        if (DB::table('categorias')->count() === 0) {
            $this->call(CategoriaSeeder::class);
        }

        if (DB::table('marcas')->count() === 0) {
            $this->call(MarcaSeeder::class);
        }

        $categoriasIds = DB::table('categorias')->pluck('id')->toArray();
        $marcasIds = DB::table('marcas')->pluck('id')->toArray();

        $productos = [];
        $faker = \Faker\Factory::create('es_ES');

        $this->command->info('Generando 2000 productos...');

        for ($i = 0; $i < 2000; $i++) {
            $precioVenta = $faker->randomFloat(2, 15, 300);
            $precioCompra = $precioVenta * $faker->randomFloat(2, 0.4, 0.7);

            $productos[] = [
                'nombre' => $this->generarNombreProducto($faker),
                'descripcion' => $faker->text(150),
                'precio' => $precioVenta,
                'preciocompra' => round($precioCompra, 2),
                'stock' => $faker->numberBetween(0, 200),
                'idcategoria' => $faker->randomElement($categoriasIds),
                'idmarca' => $faker->randomElement($marcasIds),
                'estado' => $faker->boolean(90),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Mostrar progreso cada 500 productos
            if (($i + 1) % 500 === 0) {
                $this->command->info(($i + 1) . "/2000 productos generados...");
            }

            // Insertar en lotes cada 500 registros
            if (($i + 1) % 500 === 0) {
                DB::table('productos')->insert($productos);
                $productos = [];
            }
        }

        // Insertar los productos restantes
        if (!empty($productos)) {
            DB::table('productos')->insert($productos);
        }

        $this->command->info('¡2000 productos creados exitosamente!');
    }

    private function generarNombreProducto($faker): string
    {
        $tiposRopa = ['Camiseta', 'Polo', 'Camisa', 'Jeans', 'Pantalón', 'Short', 'Sudadera'];
        $tiposZapatos = ['Zapatillas', 'Botas', 'Sandalias', 'Zapatos', 'Mocasines'];

        $tipoProducto = $faker->randomElement([...$tiposRopa, ...$tiposZapatos]);
        $material = $faker->randomElement(['Algodón', 'Poliéster', 'Cuero', 'Jean']);
        $estilo = $faker->randomElement(['Básico', 'Clásico', 'Moderno', 'Deportivo']);
        $color = $faker->randomElement(['Negro', 'Blanco', 'Azul', 'Rojo', 'Gris']);

        return "{$tipoProducto} {$material} {$estilo} {$color}";
    }
}
