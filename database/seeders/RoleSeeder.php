<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
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
            'password' => bcrypt('123456')
        ]);

        $userAdmin->assignRole($adminRole);
    }
}
