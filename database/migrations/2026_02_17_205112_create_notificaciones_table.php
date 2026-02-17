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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('residentes_id');
            $table->string('titulo');
            $table->text('mensaje');
            $table->boolean('leida')->default(false)->after('mensaje');
            $table->timestamp('fecha_evento')->nullable();
            $table->timestamps();

            $table->foreign('residentes_id')
                ->references('id')
                ->on('residentes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
