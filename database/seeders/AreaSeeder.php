<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = [
            ['code' => 'TA1', 'name' => 'Test Area 1', 'latitude' => 0, 'longitude' => 0, 'sub_district_id' => 1, 'vendor_id' => 1],
            ['code' => 'TA2', 'name' => 'Test Area 2', 'latitude' => 0, 'longitude' => 0, 'sub_district_id' => 2, 'vendor_id' => 1],
            ['code' => 'TA3', 'name' => 'Test Area 3', 'latitude' => 0, 'longitude' => 0, 'sub_district_id' => 3, 'vendor_id' => 1],
            ['code' => 'TA4', 'name' => 'Test Area 4', 'latitude' => 0, 'longitude' => 0, 'sub_district_id' => 4, 'vendor_id' => 1],
            ['code' => 'TA5', 'name' => 'Test Area 5', 'latitude' => 0, 'longitude' => 0, 'sub_district_id' => 5, 'vendor_id' => 1],
        ];
        Area::insert($area);
    }
}
