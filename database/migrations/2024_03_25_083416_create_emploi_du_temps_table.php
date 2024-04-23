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
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id('numEmploi');

            $table->string('lundi_matin')->nullable();
            $table->string('lundi_aprem')->nullable();
            $table->string('lundi_soir')->nullable();

            $table->string('mardi_matin')->nullable();
            $table->string('mardi_aprem')->nullable();
            $table->string('mardi_soir')->nullable();

            $table->string('mercredi_matin')->nullable();
            $table->string('mercredi_aprem')->nullable();
            $table->string('mercredi_soir')->nullable();

            $table->string('jeudi_matin')->nullable();
            $table->string('jeudi_aprem')->nullable();
            $table->string('jeudi_soir')->nullable();

            $table->string('vendredi_matin')->nullable();
            $table->string('vendredi_aprem')->nullable();
            $table->string('vendredi_soir')->nullable();

            $table->string('samedi_matin')->nullable();

            $table->string('codFil');

            $table->foreign('codFil')
                ->references('codFil')
                ->on('filieres')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_du_temps');
    }
};
