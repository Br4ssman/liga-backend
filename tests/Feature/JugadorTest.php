<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Jugador;
use App\Models\Club;

class JugadorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_api_retorna_lista_de_jugadores_en_json()
    {
        $club = Club::factory()->create();
        Jugador::factory()->count(3)->create(['club_id' => $club->id]);

        $response = $this->getJson('/api/jugadores');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function test_un_jugador_puede_ser_creado()
    {
        $club = Club::factory()->create();

        $datos = [
            'nombre' => 'Test Player',
            'posicion' => 'Delantero',
            'dorsal' => 10,
            'club_id' => $club->id
        ];

        $response = $this->postJson('/api/jugadores', $datos);
        $response->assertStatus(201); 
        
        $this->assertDatabaseHas('jugadors', [
            'nombre' => 'Test Player',
            'club_id' => $club->id
        ]);
    }
}