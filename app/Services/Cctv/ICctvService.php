<?php

namespace App\Services\Cctv;

use App\Models\Cctv;

interface ICctvService
{
    /**
     * @param int $id
     * 
     * @return Cctv
     */
    public function GetOneCctv(int $id): Cctv|bool;
}