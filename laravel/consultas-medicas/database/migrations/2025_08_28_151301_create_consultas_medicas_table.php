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
        Schema::create('consultas_medicas', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_consulta', ['primera vez', 'control', 'urgencia', 'seguimiento']);
            $table->unsignedBigInteger('id_paciente');
            $table->date('fecha_consulta');
            $table->text('motivo')->nullable();
            $table->text('diagnostico')->nullable();
            $table->enum('estado_pago', ['pendiente', 'pagado', 'facturado'])->default('pendiente');
            $table->timestamps();

            // Llave foránea hacia la tabla pacientes
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_medicas');
    }
};
