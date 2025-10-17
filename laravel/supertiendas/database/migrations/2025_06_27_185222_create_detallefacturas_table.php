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
        Schema::create('detallefacturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idfactura');
            $table->foreign('idfactura')->references('id')->on('facturas');
            $table->unsignedBigInteger('idproducto');
            $table->foreign('idproducto')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->decimal('preciounitario',10,2);
            $table->decimal('totallinea',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallefacturas');
    }
};
