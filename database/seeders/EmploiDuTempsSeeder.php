<?php

namespace Database\Seeders;

use App\Models\EmploiDuTemps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploiDuTempsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmploiDuTemps::create([
            'codFil' => 'Inf', // Assurez-vous que cet ID existe dans la table filieres
            'lundi_matin' => 'Mathématiques',
            'lundi_aprem' => 'Physique',
            'lundi_soir' => 'Chimie',
            'mardi_matin' => 'Biologie',
            'mardi_aprem' => 'Histoire',
            'mardi_soir' => 'Géographie',
            'mercredi_matin' => 'Mathématiques',
            'mercredi_aprem' => 'Chimie',
            'mercredi_soir' => 'Physique',
            'jeudi_matin' => 'Biologie',
            'jeudi_aprem' => 'Mathématiques',
            'jeudi_soir' => 'Physique',
            'vendredi_matin' => 'Chimie',
            'vendredi_aprem' => 'Histoire',
            'vendredi_soir' => 'Géographie',
            'samedi_matin' => 'Mathématiques',
        ]);
    }
}
