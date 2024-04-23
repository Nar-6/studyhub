<?php

namespace Database\Seeders;

use App\Models\Composition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Composition::create([
            'numIns' => 1,
            'numEp' => 1,
            'note' => 15.5,
        ]);

        Composition::create([
            'numIns' => 1,
            'numEp' => 2,
            'note' => 13.0,
        ]);
    }
}
