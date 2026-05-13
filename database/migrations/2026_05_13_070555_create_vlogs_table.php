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
        Schema::create('vlogs', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');          // Título del video
            $table->text('descripcion');      // Descripción o notas
            $table->string('url_video');      // Link de YouTube
            $table->date('fecha_publicacion'); // Fecha del vlog
            $table->timestamps();             // Registra creación y edición
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vlogs');
    }
};
