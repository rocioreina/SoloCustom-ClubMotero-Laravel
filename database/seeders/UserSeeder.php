<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Rocío',
            'apellidos' => 'Reina Delgado',
            'email' => 'rocioreina@gmail.com',
            'password' => bcrypt('rocioreina'),
        ])->assignRole('admin');

        User::create([
            'nombre' => 'Rocío',
            'apellidos' => 'Reina Delgado',
            'email' => 'rocioreina1@gmail.com',
            'password' => bcrypt('rocioreina1'),
        ])->assignRole('normal');

    }
}
