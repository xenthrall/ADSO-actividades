<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MarcaSeeder::class,
            CategoriaSeeder::class,
            PaymentMethodSeeder::class,
            EstadoSeeder::class,
            ClienteSee::class,
            ProductoSeeder::class,
            FacturaSeeder::class,
            DetalleFacturaSeeder::class,
        ]);
    }

}
