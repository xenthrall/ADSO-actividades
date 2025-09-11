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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id(); // id INT auto increment

            $table->string('titulo', 200);
            $table->enum('tipo', ['pelicula', 'serie', 'documental']);
            $table->string('genero', 100)->nullable();
            $table->year('anio_lanzamiento')->nullable();
            $table->integer('duracion_minutos')->nullable();

            // Relación con clasificaciones
            $table->foreignId('clasificacion_id')
                  ->constrained('clasificaciones')
                  ->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenidos');
    }
};

