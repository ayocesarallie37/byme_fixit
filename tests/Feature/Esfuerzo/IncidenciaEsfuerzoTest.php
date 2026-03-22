<?php

namespace Tests\Feature\Esfuerzo;

use App\Models\Residente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncidenciaEsfuerzoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function test_crear_multiples_incidencias()
    {
        $user = User::factory()->create([
            'role' => 'residente',
        ]);

        $residente = Residente::create([
            'user_id' => $user->id,
        ]);

        for ($i = 1; $i <= 20; $i++) {
            $this->actingAs($user)->post('/residente/incidencias', [
                'asunto' => "Incidencia $i prueba",
                'descripcion' => "Descripción válida número $i con suficiente texto",
                'prioridad' => 'media',
            ]);
        }

        $this->assertDatabaseCount('incidencias', 20);
    }

    public function test_crear_incidencia_con_texto_largo()
    {
        $user = User::factory()->create([
            'role' => 'residente',
        ]);

        Residente::create([
            'user_id' => $user->id,
        ]);

        $asunto = str_repeat('A', 200);
        $descripcion = str_repeat('Descripción larga ', 20);

        $response = $this->actingAs($user)->post('/residente/incidencias', [
            'asunto' => $asunto,
            'descripcion' => $descripcion,
            'prioridad' => 'media',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('incidencias', [
            'asunto' => $asunto,
        ]);
    }
}
