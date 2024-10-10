<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $province = [
            ['code' => 'TP1', 'name' => 'Test Province 1', 'coordinates' => 'POINT(0 0)'],
            ['code' => 'TP2', 'name' => 'Test Province 2', 'coordinates' => 'POINT(0 0)'],
            ['code' => 'TP3', 'name' => 'Test Province 3', 'coordinates' => 'POINT(0 0)'],
            ['code' => 'TP4', 'name' => 'Test Province 4', 'coordinates' => 'POINT(0 0)'],
            ['code' => 'TP5', 'name' => 'Test Province 5', 'coordinates' => 'POINT(0 0)'],
        ];
        Province::insert($province);
    }
}
