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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id('matricule');
            $table->string('prenom');
            $table->string('nom');
            $table->string('sexe');
            $table->unsignedBigInteger('parentId');
            $table->timestamps();

            $table->foreign('parentId')->references('parentId')->on('etudiant__parents');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
