<?php

namespace Database\Seeders;

use App\Models\Etudiant_Parent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etudiant_Parent::create([
            'nom' => 'Parent 1',
            'user_id' => 1,
        ]);

        Etudiant_Parent::create([
            'nom' => 'Parent 2',
            'user_id' => 2,
        ]);
     


    }
}
