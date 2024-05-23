<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiants = [
            ['nom' => 'Dupont', 'prenom' => 'Jean', 'sexe' => 'M', 'numero' => '1234567890', 'parent_id' => 1],
        ];

        // Insérez les étudiants dans la table
        foreach ($etudiants as $etudiant) {
            Etudiant::create($etudiant);
        }
    }
}
