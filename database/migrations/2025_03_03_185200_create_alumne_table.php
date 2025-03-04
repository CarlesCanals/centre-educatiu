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
        Schema::create('alumne', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nom');
            $table->string('cognom');
            $table->date('data_naixement');
            $table->string('nif')->unique();
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->timestamps();
    
            $table->foreign('classe_id')->references('id')->on('classe')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumne');
    }
};
