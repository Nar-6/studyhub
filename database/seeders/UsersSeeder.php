<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Générer des utilisateurs de test
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'role' => 'admin',
                'password' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'role' => 'user',
                'password' => 'user1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres utilisateurs si nécessaire
        ];

        // Insérer les données dans la table 'users'
        DB::table('users')->insert($users);
    }
}
