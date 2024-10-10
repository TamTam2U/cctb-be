<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $district = [
            ['code' => 'TD1', 'name' => 'Test District 1', 'coordinates' => 'POINT(0 0)', 'province_id' => 1],
            ['code' => 'TD2', 'name' => 'Test District 2', 'coordinates' => 'POINT(0 0)', 'province_id' => 2],
            ['code' => 'TD3', 'name' => 'Test District 3', 'coordinates' => 'POINT(0 0)', 'province_id' => 3],
            ['code' => 'TD4', 'name' => 'Test District 4', 'coordinates' => 'POINT(0 0)', 'province_id' => 4],
            ['code' => 'TD5', 'name' => 'Test District 5', 'coordinates' => 'POINT(0 0)', 'province_id' => 5],
        ];
        District::insert($district);
    }
}
