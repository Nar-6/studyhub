<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'role'=> 'admin'
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
