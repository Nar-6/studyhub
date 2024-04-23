<?php

namespace Database\Seeders;

use App\Models\Professeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professeur::create([
            'nomProf' => 'Professeur X',
            'user_id' => 1, // Assurez-vous que cet ID existe dans la table users
        ]);

        Professeur::create([
            'nomProf' => 'Professeur Y',
            'user_id' => 2, // Assurez-vous que cet ID existe dans la table users
        ]);
    }
}
