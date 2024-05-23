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
            $table->string('matricule')->primary()->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('numero');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('parent_id')->on('etudiant_parents')->onDelete('cascade');
            $table->timestamps();
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
