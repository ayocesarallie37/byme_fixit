<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->text('descripcion');
            $table->string('ubicación')->nullable();

            $table->enum('prioridad', ['baja', 'media', 'alta'])
                ->default('media');

            $table->enum('estado', [
                'reportada',
                'asignada',
                'en_progreso',
                'completada'
            ])->default('reportada');

            $table->foreignId('residentes_id')
                ->constrained('residentes')
                ->onDelete('cascade');

            $table->foreignId('tecnicos_id')
                ->nullable()
                ->constrained('tecnicos')
                ->onDelete('set null');

            $table->timestamp('asignado_en')->nullable();
            $table->timestamp('completado_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
