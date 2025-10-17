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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio',10,2);
            $table->decimal('preciocompra',10,2);
            $table->integer('stock');
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categorias');
            $table->unsignedBigInteger('idmarca');
            $table->foreign('idmarca')->references('id')->on('marcas');
            $table->timestamps();
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
