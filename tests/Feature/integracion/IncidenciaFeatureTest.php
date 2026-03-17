<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Residente;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncidenciaFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function test_usuario_puede_crear_incidencia()
    {
        $user = User::factory()->create([
            'role' => 'residente'
        ]);

        $residente = Residente::create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->post('/residente/incidencias', [
            'asunto' => 'Fuga de agua',
            'descripcion' => 'Fuga en cocina',
            'ubicación' => 'Cocina',
            'prioridad' => 'media'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('incidencias', [
            'asunto' => 'Fuga de agua',
            'descripcion' => 'Fuga en cocina'
        ]);
    }

    public function test_no_permite_crear_incidencia_sin_datos()
    {
        $this->withoutMiddleware();

        $user = User::factory()->create([
            'role' => 'residente'
        ]);

        Residente::create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->post('/residente/incidencias', []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['asunto', 'descripcion', 'prioridad']);
    }
}