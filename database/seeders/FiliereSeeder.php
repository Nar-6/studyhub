<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filieres = [
            [
                'codFil'=> 'Inf',
                'libFil' => 'Informatique'],
            [
                'codFil'=> 'Maths',
                'libFil' => 'Mathématiques'],
            [
                'codFil'=> 'SI',
                'libFil' => 'Sécurité Informatique'],
            [
                'codFil'=> 'AL',
                'libFil' => 'Architecture logiciel'],
            [
                'codFil'=> 'IA',
                'libFil' => 'Intelligence Artificielle'],
        ];

        // Insérer les filières dans la table 'filieres'
        foreach ($filieres as $filiere) {
            Filiere::create($filiere);
        }
    }
}
