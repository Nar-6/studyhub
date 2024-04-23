<?php

namespace Database\Seeders;

use App\Models\Epreuve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpreuveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Epreuve::create([
            'dateEp' => '2024-04-20',
            'heurDeb' => '09:00:00',
            'heurFin' => '12:00:00',
            'numProf' => 1, // Assurez-vous que cet ID existe dans la table professeurs
            'codFil' => 'Inf', // Assurez-vous que cet ID existe dans la table filieres
            'codMat' => 1, // Assurez-vous que cet ID existe dans la table matieres
            'annee' => 2024,
        ]);

        Epreuve::create([
            'dateEp' => '2024-04-21',
            'heurDeb' => '13:00:00',
            'heurFin' => '15:00:00',
            'numProf' => 2, // Assurez-vous que cet ID existe dans la table professeurs
            'codFil' => 'Inf', // Assurez-vous que cet ID existe dans la table filieres
            'codMat' => 2, // Assurez-vous que cet ID existe dans la table matieres
            'annee' => 2024,
        ]);
    }
}
