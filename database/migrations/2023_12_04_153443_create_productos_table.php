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
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio');
            $table->date('fecha_publicacion')->default(date('Y-m-d'));
            $table->tinyInteger('puntuacion')->nullable();
    
            $table->unsignedTinyInteger('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria')->onDelete('cascade');

            $table->unsignedTinyInteger('id_estado_producto');
            $table->foreign('id_estado_producto')->references('id_estado_producto')->on('estado_producto')->onDelete('cascade');


            $table->foreignId('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
