<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matiere::create([
            'libMat' => 'Mathématiques',
        ]);

        Matiere::create([
            'libMat' => 'Physique',
        ]);

        Matiere::create([
            'libMat' => 'Chimie',
        ]);
    }
}
