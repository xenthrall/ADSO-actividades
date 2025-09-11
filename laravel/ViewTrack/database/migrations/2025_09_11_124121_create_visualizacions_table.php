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
        Schema::create('visualizaciones', function (Blueprint $table) {
            $table->id(); // BIGINT auto incremental
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('contenido_id');
            $table->dateTime('fecha_visualizacion');
            $table->integer('minutos_vistos')->default(0);
            $table->enum('dispositivo', ['mobile', 'tablet', 'smart-tv', 'web', 'consola']);
            $table->boolean('completado')->default(false);
            $table->integer('calificacion')->nullable();
            $table->integer('progreso_actual')->default(0);

            $table->timestamps();

            // 🔑 Llaves foráneas 
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('contenido_id')->references('id')->on('contenidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visualizaciones');
    }
};
