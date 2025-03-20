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
        $userAdmin = User::create([
            'name' => 'Andika Nur Sasmito',
            'email' => 'andika@admin.com',
            'password' => bcrypt('andika')
        ]);

        // $userAdmin->assignRole($adminRole);
    }
}
