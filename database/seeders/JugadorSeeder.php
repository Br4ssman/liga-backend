<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jugador;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jugador::create([
            'nombre' => 'Juan López',
            'posicion' => 'Delantero',
            'dorsal' => 9,
            'club_id' => 1
        ]);

        Jugador::create([
            'nombre' => 'Carlos Pérez',
            'posicion' => 'Portero',
            'dorsal' => 1,
            'club_id' => 1
        ]);

        Jugador::create([
            'nombre' => 'Miguel García',
            'posicion' => 'Defensa',
            'dorsal' => 5,
            'club_id' => 2
        ]);
    }
}
