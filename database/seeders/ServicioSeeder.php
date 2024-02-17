<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            [
                'nombre' => 'Manicura',
                'precio' => 15,
                'duracion' => '01:00', // 1 hora y 30 minutos
            ],
            [
                'nombre' => 'Manicura Shellac',
                'precio' => 30,
                'duracion' => '01:00', // 1 hora
            ],
            [
                'nombre' => 'Relleno nuevo',
                'precio' => 37,
                'duracion' => '01:00', // 45 minutos
            ],
            [
                'nombre' => 'Pedicura',
                'precio' => 32,
                'duracion' => '01:00', // 45 minutos
            ],
            [
                'nombre' => 'Relleno semipermanente',
                'precio' => 32,
                'duracion' => '01:00', // 45 minutos
            ],
            [
                'nombre' => 'Nail art cortas',
                'precio' => 4,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Nail art largas',
                'precio' => 7,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'cejas',
                'precio' => 5,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Acrilico XXL',
                'precio' => 40,
                'duracion' => '01:00', // 45 minutos
            ],
            [
                'nombre' => 'Pedicura semipermanente',
                'precio' => 37,
                'duracion' => '01:00', // 45 minutos
            ],
            [
                'nombre' => 'Arreglar uña',
                'precio' => 5,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Manicura chico',
                'precio' => 12,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Labios',
                'precio' => 4,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Retirar acrilico',
                'precio' => 15,
                'duracion' => '00:30', // 45 minutos
            ],
            [
                'nombre' => 'Arreglar uña Acrilico',
                'precio' => 7,
                'duracion' => '00:30', // 45 minutos
            ],


        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }
    }
}

