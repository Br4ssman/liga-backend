<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Liga;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Liga::create([
            'nombre' => 'Liga Escolar',
            'deporte' => 'Fútbol',
            'temporada' => '2024-2025'
        ]);
    }
}
