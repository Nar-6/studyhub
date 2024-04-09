<?php

namespace Database\Seeders;

use App\Models\Epreuve;
use App\Models\option;
use App\Models\Professeur;
use App\Models\question;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role'=>'Professeur',
        ]);

        Professeur::factory(10)->create([
            'nomProf'=> 'abasse',
            'user_id'=> '1',
        ]);

        // Epreuve::factory(10)->create([
        //     'nomEp' => 'Nom de l\'épreuve',
        //     'dateEp' =>' 2024-04-02 ',
        //     'heurDeb' =>'14:00',
        //     'heurFin' =>'22:00',
        //     'numProf' =>'1',
        //     'codFil' =>'',
        //     'codMat' =>'',
        // ]);
        // question::factory(10)->create([

        // ]);
        // option::factory(10)->create([

        // ]);


    }

}
