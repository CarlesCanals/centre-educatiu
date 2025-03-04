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
        Schema::create('professor', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('cognom');
            $table->date('data_naixement');
            $table->string('nif')->unique();
            // Opcional: si vols guardar la classe a la qual pertany el professor, pots incloure:
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->timestamps();
            // Per evitar problemes circulars, pots ometre la clau forana o afegir-la en una migració separada:
            // $table->foreign('classe_id')->references('id')->on('classe')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor');
    }
};
