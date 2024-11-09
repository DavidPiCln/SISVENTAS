<?php

namespace Database\Seeders;

use App\Models\Compania;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Compania::create([
            'nombre' => 'System V',
            'correo' => 'davidp@prueba',
            'telefono' => '12345678',
            'direccion' => 'Guatemala',
        ]);

    }
}
