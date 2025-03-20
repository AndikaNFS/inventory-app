<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('outlets')->insert([
            [
                'name' => 'RR Sudirman',
                'location' => 'Sudirman, Jakarta',
                // 'device_id' => '1',
            ],
            [
                'name' => 'RR Senopati',
                'location' => 'Senopati, Jakarta',
                // 'device_id' => '2',

            ],
            [
                'name' => 'RR Lotte',
                'location' => 'Kuningan, Jakarta',
                // 'device_id' => '2',

            ],
        ]);
    }
}
