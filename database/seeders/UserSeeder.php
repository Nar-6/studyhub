<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // Mot de passe crypté
                'role' => 'admin', // Rôle par défaut : admin
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user', // Utilisateur ordinaire
            ],
        ];

        // Insérez les utilisateurs dans la table
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
