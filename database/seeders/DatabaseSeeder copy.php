<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Epreuve;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            FiliereSeeder::class,
            ProfesseurSeeder::class,
            EtudiantParentSeeder::class,
            MatiereSeeder::class,
            EpreuveSeeder::class,
            EtudiantSeeder::class,
            InscriptionSeeder::class,
            CompositionSeeder::class,
            EmploiDuTempsSeeder::class
        ]);
    }
}
