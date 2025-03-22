<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('devices')->insert([
            [
                'outlet_id' => '1',
                'device' => 'POS',
                'merek' => 'Dell',
                'type' => 'AllinOne',
                'serial_num' => '1028410',
                'qlt' => '4',
                'status'=> 'Baik',
                'image' => null,
            ],
            [
                'outlet_id' => '2',
                'device' => 'Scanner',
                'merek' => 'Exon',
                'type' => 'Thermal',
                'serial_num' => '23049',
                'qlt' => '4',
                'status'=> 'Baik',
                'image' => null,
            ],
            
            [
                'outlet_id' => '3',
                'device' => 'Mouse',
                'merek' => 'Exon',
                'type' => 'Thermal',
                'serial_num' => '23049',
                'qlt' => '4',
                'status'=> 'Baik',
                'image' => null,
            ],
        ]);

        // DB::table('displacements')->insert([
        //     [
        //         'name_pic' => 'Dimas',
        //         'name_it' => 'Andika',
        //         'description' => 'Barang rusak',
        //         'device_id' => '1',
        //         'outlet_id' => '1',
        //     ]
        // ]);
        
    }
}
