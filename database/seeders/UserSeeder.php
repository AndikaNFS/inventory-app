<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $userRole = Role::create([
            'name' => 'user'
        ]);

        $userAdmin = User::create([
            'name' => 'Andika Nur Sasmito',
            'email' => 'andika@admin.com',
            'password' => bcrypt('andika')
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('userlogin')
        ]);

        $userAdmin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
