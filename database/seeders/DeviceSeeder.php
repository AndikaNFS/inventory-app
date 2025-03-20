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
                'outlet_id' => '1',
                'device' => 'Printer',
                'merek' => 'Epson',
                'type' => 'Thermal',
                'serial_num' => '23949',
                'qlt' => '3',
                'status'=> 'Rusak',
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
                'outlet_id' => '2',
                'device' => 'TV',
                'merek' => 'TCL',
                'type' => 'SmarTV',
                'serial_num' => '23049',
                'qlt' => '5',
                'status'=> 'Baik',
                'image' => null,
            ],
            [
                'outlet_id' => '2',
                'device' => 'Monitor',
                'merek' => 'Asus',
                'type' => '-',
                'serial_num' => '23049',
                'qlt' => '3',
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
            [
                'outlet_id' => '3',
                'device' => 'TV',
                'merek' => 'LG',
                'type' => 'SmarTV',
                'serial_num' => '232',
                'qlt' => '5',
                'status'=> 'Baik',
                'image' => null,
            ],
            [
                'outlet_id' => '3',
                'device' => 'Monitor',
                'merek' => 'Lenovo',
                'type' => '-',
                'serial_num' => '13',
                'qlt' => '3',
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
