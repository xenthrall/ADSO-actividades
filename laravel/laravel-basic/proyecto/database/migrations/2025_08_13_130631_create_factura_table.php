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
        Schema::create('factura', function (Blueprint $table) {
            $table->id('id_factura');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_pago');
            $table->dateTime('fecha');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('impuestos', 10, 2);
            $table->decimal('total', 10, 2);

            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->foreign('id_pago')->references('id_pago')->on('modo_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
