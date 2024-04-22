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
            $table->string('codFil');
            $table->unsignedBigInteger('codMat');
            $table->integer('annee');
            $table->timestamps();

            $table->foreign('numProf')->references('numProf')->on('professeurs')->onDelete('cascade');
            $table->foreign('codFil')->references('codFil')->on('filieres')->onDelete('cascade');
            $table->foreign('codMat')->references('codMat')->on('matieres')->onDelete('cascade');

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
