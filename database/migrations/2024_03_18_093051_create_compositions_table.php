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
        Schema::create('compositions', function (Blueprint $table) {
            // Définition des colonnes
            $table->unsignedBigInteger('numIns');
            $table->unsignedBigInteger('numEp');
            $table->float('note');
            $table->timestamps();
        
            // Définition de la clé primaire composée
            $table->primary(['numIns', 'numEp']);
        
            // Déclaration des clés étrangères
            $table->foreign('numIns')
                  ->references('numIns')
                  ->on('inscriptions')
                  ->onDelete('cascade');
        
            $table->foreign('numEp')
                  ->references('numEp')
                  ->on('epreuves')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compositions');
    }
};
