<?php

namespace App\Services\Cctv;

use App\Models\Cctv;

class CctvService implements ICctvService
{
    /**
     * @param int $id
     * 
     * @return Cctv
     */
    public function GetOneCctv(int $id): Cctv|bool
    {
        $cctv = Cctv::where('id', $id)->first();
        if(!$cctv) {
            return false;
        }
        return $cctv;
    }
}