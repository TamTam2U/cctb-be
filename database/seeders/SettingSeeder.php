<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            [
                'code' => 'setting1',
                'name' => 'Setting 1',
                'grid' => '1x1',
                'vendor_id' => 1,
            ],
            [
                'code' => 'setting2',
                'name' => 'Setting 2',
                'grid' => '2x2',
                'vendor_id' => 1,
            ],
            [
                'code' => 'setting3',
                'name' => 'Setting 3',
                'grid' => '3x3',
                'vendor_id' => 1,
            ],
            [
                'code' => 'setting4',
                'name' => 'Setting 4',
                'grid' => '4x4',
                'vendor_id' => 1,
            ],
            [
                'code' => 'setting5',
                'name' => 'Setting 5',
                'grid' => '6x6',
                'vendor_id' => 1,
            ]
        ];

        foreach ($setting as $data) {
            \App\Models\Setting::create($data);
        }
    }
}
