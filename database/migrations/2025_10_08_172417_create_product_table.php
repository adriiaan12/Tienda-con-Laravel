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
        Schema::create('Product', function (Blueprint $table) {
            $table->id();
            //nombre del producto con un maximo de 128 caracteres indice único 
            $table->string('name', 128)->unique();
            //descripcion del producto valor por defecto 'cadena vacia'
            $table->string('description')->default('');
            //precio del producto indice si 
            $table->decimal('price', 8, 2)->index();
            //imagen del producto no nulable
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};
