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
        Schema::create('alcohol_answers', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('question_id');
          $table->string('answer');
          $table->integer('score'); // Puntaje de 0 a 4 para esta respuesta
         $table->timestamps();

    $table->foreign('question_id')->references('id')->on('alcohol_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alcohol_answers');
    }
};
