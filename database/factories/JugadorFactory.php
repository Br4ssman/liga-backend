<?php

namespace Database\Factories;

use App\Models\Jugador;
use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jugador>
 */
class JugadorFactory extends Factory
{

    protected $model = Jugador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'posicion' => $this->faker->randomElement(['Delantero', 'Base', 'Portero']),
            'dorsal' => $this->faker->numberBetween(1, 99),
            'club_id' => Club::factory(),
        ];
    }
}
