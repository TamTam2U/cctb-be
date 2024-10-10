<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Vendor::create([
            'name' => 'Test Vendor',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'vendor_id' => 1,
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ]);

        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SubDistrictSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(CctvSeeder::class);
    }
}
