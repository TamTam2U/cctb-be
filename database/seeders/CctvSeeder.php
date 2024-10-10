<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cctv = [
            [
                'name' => 'CCTV 1',
                'url' => 'http://cctv1.com',
                'is_active' => 1,
                'threads' => 1,
                'preset' => 'lorem ipsum',
                'video' => '{
                    "status": true,
                    "codec": "h264",
                    "bitrate": "lorem ipsum",
                    "fps": 60,
                    "width": 1920,
                    "height": 1080
                }',
                'audio' => '{
                    "status": true,
                    "codec": "aac",
                    "bitrate": "lorem ipsum",
                }',
                'is_running' => 1,
                'area_id' => 1,
            ],
            [
                'name' => 'CCTV 2',
                'url' => 'http://cctv2.com',
                'is_active' => 1,
                'threads' => 2,
                'preset' => 'lorem ipsum',
                'video' => '{
                    "status": true,
                    "codec": "h264",
                    "bitrate": "lorem ipsum",
                    "fps": 60,
                    "width": 1920,
                    "height": 1080
                }',
                'audio' => '{
                    "status": true,
                    "codec": "aac",
                    "bitrate": "lorem ipsum",
                }',
                'is_running' => 1,
                'area_id' => 2,
            ],
            [
                'name' => 'CCTV 3',
                'url' => 'http://cctv3.com',
                'is_active' => 1,
                'threads' => 3,
                'preset' => 'lorem ipsum',
                'video' => '{
                    "status": true,
                    "codec": "h264",
                    "bitrate": "lorem ipsum",
                    "fps": 60,
                    "width": 1920,
                    "height": 1080
                }',
                'audio' => '{
                    "status": true,
                    "codec": "aac",
                    "bitrate": "lorem ipsum",
                }',
                'is_running' => 1,
                'area_id' => 3,
            ],
            [
                'name' => 'CCTV 4',
                'url' => 'http://cctv4.com',
                'is_active' => 1,
                'threads' => 4,
                'preset' => 'lorem ipsum',
                'video' => '{
                    "status": true,
                    "codec": "h264",
                    "bitrate": "lorem ipsum",
                    "fps": 60,
                    "width": 1920,
                    "height": 1080
                }',
                'audio' => '{
                    "status": true,
                    "codec": "aac",
                    "bitrate": "lorem ipsum",
                }',
                'is_running' => 1,
                'area_id' => 4,
            ],
        ];

        foreach ($cctv as $data) {
            \App\Models\Cctv::create($data);
        }
    }
}
