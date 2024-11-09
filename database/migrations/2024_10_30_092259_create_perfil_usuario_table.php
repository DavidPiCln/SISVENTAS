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
        Schema::create('perfil_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('apellido', 50);
            $table->string('segundo_nombre', 50)->nullable();
            $table->string('primer_nombre', 50);
            $table->string('num_contacto', 20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 20)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('estado', 20)->nullable();
            $table->text('detalles_bancarios')->nullable();
            $table->decimal('descuento', 5, 2)->nullable();
            $table->timestamps();
            
            // Relación con user
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil_usuario');
    }
};
