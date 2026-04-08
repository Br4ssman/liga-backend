<?php

namespace Database\Seeders;

use App\Models\Partido;
use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partido::create([
            'liga_id' => 1,
            'club_local_id' => 1,
            'club_visitante_id' => 2,
            'fecha' => '2025-01-15',
            'resultado' => '2-1'
        ]);

        Partido::create([
            'liga_id' => 1,
            'club_local_id' => 2,
            'club_visitante_id' => 3,
            'fecha' => '2025-01-22',
            'resultado' => '1-1'
        ]);
    }
}
