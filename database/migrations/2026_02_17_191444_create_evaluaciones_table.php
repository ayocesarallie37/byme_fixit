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
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incidencia_id')
                ->constrained('incidencias')
                ->onDelete('cascade');

            $table->foreignId('residentes_id')
                ->constrained('residentes')
                ->onDelete('cascade');

            $table->tinyInteger('rapidez');      // 1-5
            $table->tinyInteger('calidad');      // 1-5
            $table->tinyInteger('atencion');     // 1-5

            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
