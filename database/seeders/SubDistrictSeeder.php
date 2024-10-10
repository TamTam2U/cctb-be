<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subDistrict = [
            ['code' => 'TSD1', 'name' => 'Test Sub District 1', 'coordinates' => 'POINT(0 0)', 'district_id' => 1],
            ['code' => 'TSD2', 'name' => 'Test Sub District 2', 'coordinates' => 'POINT(0 0)', 'district_id' => 2],
            ['code' => 'TSD3', 'name' => 'Test Sub District 3', 'coordinates' => 'POINT(0 0)', 'district_id' => 3],
            ['code' => 'TSD4', 'name' => 'Test Sub District 4', 'coordinates' => 'POINT(0 0)', 'district_id' => 4],
            ['code' => 'TSD5', 'name' => 'Test Sub District 5', 'coordinates' => 'POINT(0 0)', 'district_id' => 5],
        ];
        SubDistrict::insert($subDistrict);
    }
}
