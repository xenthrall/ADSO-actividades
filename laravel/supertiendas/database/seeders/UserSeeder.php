<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // evita duplicados
            [
                'name' => 'Administrador',
                'email' => 'admin@cronosena.com',
                'password' => Hash::make('password'), 
            ]
        );
    }
}
