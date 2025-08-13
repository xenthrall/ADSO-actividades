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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('direccion', 100);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 15);
            $table->string('email', 100);
            $table->date('fecha_registro');
            $table->enum('genero', ['Masculino', 'Femenino', 'Otros']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
