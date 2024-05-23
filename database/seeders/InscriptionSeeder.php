<?php

namespace Database\Seeders;

use App\Models\Inscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inscriptions = [
            [
                'dateIns' => '2024-01-10',
                'annee' => 2024,
                'codFil' => 'Inf', // Remplacez par l'ID d'une filière existante
                'matricule' => 'ETU001', // Remplacez par un matricule d'étudiant existant
                'user_id' => 1, // Remplacez par l'ID d'un utilisateur existant
            ],
        ];

        // Insérez les inscriptions dans la table
        foreach ($inscriptions as $inscription) {
            Inscription::create($inscription);
        }
    }
}
