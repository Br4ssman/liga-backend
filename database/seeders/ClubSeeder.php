<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::create([
            'nombre' => 'Club Deportivo Maestre de Calatrava',
            'ciudad' => 'Ciudad Real',
            'categoria' => 'Alevines'
        ]);

        Club::create([
            'nombre' => 'Atlético Maestre',
            'ciudad' => 'Almagro',
            'categoria' => 'Juvenil'
        ]);

        Club::create([
            'nombre' => 'Sporting Cracks',
            'ciudad' => 'Puertollano',
            'categoria' => 'Senior'
        ]);
    }
}
