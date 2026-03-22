<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IncidenciaUnitTest extends TestCase
{
    public function test_crear_incidencia_correctamente()
{
    $user = User::factory()->create([
        'role' => 'residente'
    ]);

    $residenteId = DB::table('residentes')->insertGetId([
        'user_id' => $user->id,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    $incidencia = Incidencia::create([
        'asunto' => 'Fuga de agua',
        'descripcion' => 'Hay fuga en el baño',
        'ubicación' => 'Baño principal',
        'prioridad' => 'media',
        'estado' => 'reportada',
        'residentes_id' => $residenteId
    ]);

    $this->assertDatabaseHas('incidencias', [
        'asunto' => 'Fuga de agua'
    ]);
}

    /** @test */
    public function no_permite_crear_incidencia_sin_asunto()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Incidencia::create([
            'descripcion' => 'Incidencia sin asunto',
            'prioridad' => 'media',
            'estado' => 'reportada'
        ]);
    }
}