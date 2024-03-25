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
        Schema::create('epreuves', function (Blueprint $table) {
            $table->id('numEp');
            $table->date('dateEp');
            $table->time('heurDeb');
            $table->time('heurFin');
            $table->unsignedBigInteger('numProf');
            $table->foreign('numProf')->references('numProf')->on('professeurs')->onDelete('cascade');
            $table->unsignedBigInteger('codFil');
            $table->foreign('codFil')->references('codFil')->on('filieres')->onDelete('cascade');
            $table->unsignedBigInteger('codMat');
            $table->foreign('codMat')->references('codMat')->on('matieres')->onDelete('cascade');
            $table->integer('annee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuves');
    }
};
