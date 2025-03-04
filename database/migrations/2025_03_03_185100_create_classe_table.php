<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('classe', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->id();
        $table->string('grup');
        // Canvia 'tutor' per 'tutor_id'
        $table->unsignedBigInteger('tutor_id')->nullable();
        $table->timestamps();

        $table->foreign('tutor_id')->references('id')->on('professor')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
