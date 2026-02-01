<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor');
            $table->string('portada');
            $table->string('genero');
            $table->integer('anyo_publicacion');
            $table->string('formato');
            $table->string('estado_lectura');
            $table->integer('puntuacion')->default(1);
            $table->boolean('favorito')->default(false);
            $table->string('opinion')->nullable();
            $table->string('prestado_a')->nullable();
            $table->date('fecha_prestamo')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
