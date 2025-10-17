<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcliente');
            $table->foreign('idcliente')->references('id')->on('clientes');
            $table->unsignedBigInteger('idestado');
            $table->foreign('idestado')->references('id')->on('estados');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('idpago');
            $table->foreign('idpago')->references('id')->on('payment_methods');
            $table->decimal('subtotal',10,2);
            $table->decimal('impuestos',10,2);
            $table->decimal('total',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
