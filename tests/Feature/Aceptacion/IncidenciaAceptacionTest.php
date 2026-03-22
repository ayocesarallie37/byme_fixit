<?php

namespace Tests\Feature\Aceptacion;

use App\Models\Residente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IncidenciaAceptacionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware();
    }

    public function test_flujo_completo_creacion_incidencia()
    {
        $user = User::factory()->create([
            'role' => 'residente',
        ]);

        Residente::create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->post('/residente/incidencias', [
            'asunto' => 'Problema eléctrico',
            'descripcion' => 'No hay luz en la sala',
            'prioridad' => 'alta',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('incidencias', [
            'asunto' => 'Problema eléctrico',
        ]);
    }

    public function test_usuario_sin_rol_residente_no_puede_crear_incidencia()
    {
        $user = User::factory()->create([
            'role' => 'tecnico',
        ]);

        $response = $this->actingAs($user)->post('/residente/incidencias', [
            'asunto' => 'Prueba',
            'descripcion' => 'Prueba desc',
            'prioridad' => 'media',
        ]);

        $response->assertStatus(403);
    }
}
