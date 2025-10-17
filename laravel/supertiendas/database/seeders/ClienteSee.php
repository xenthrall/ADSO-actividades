<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClienteSee extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_ES'); // Español

        $clientes = [];

        for ($i = 0; $i < 200; $i++) {
            $genero = $faker->randomElement(['Masculino', 'Femenino']);
            $nombre = $genero === 'Masculino' ? $faker->firstNameMale() : $faker->firstNameFemale();

            $clientes[] = [
                'nombre' => $nombre,
                'apellido' => $faker->lastName() . ' ' . $faker->lastName(),
                'direccion' => $faker->streetAddress() . ', ' . $faker->city() . ', ' . $faker->state(),
                'fechanacimiento' => $faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
                'telefono' => $faker->numerify('6## ### ###'),
                'email' => strtolower($nombre) . '.' . strtolower($faker->lastName()) . $i . '@' . $faker->freeEmailDomain(),
                'genero' => $genero,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insertar en lotes para mejor performance
        foreach (array_chunk($clientes, 50) as $lote) {
            DB::table('clientes')->insert($lote);
        }
    }
}
