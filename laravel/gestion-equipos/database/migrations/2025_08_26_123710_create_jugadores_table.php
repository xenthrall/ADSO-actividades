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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('posicion'); // Ej: Delantero, Defensa, Portero, etc.
            $table->integer('numero')->nullable(); // Número de camiseta
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();

            // Relación con equipos
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
