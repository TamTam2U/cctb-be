<?php

namespace App\Services\Area;

use App\Models\Area;
use Illuminate\Database\Eloquent\Collection;

class AreaService implements IAreaService
{
    public function GetOne(int $id): Area
    {
        $area = Area::where('id', $id)->first();
        if (!$area) {
            return null;
        }
        return $area;
    }

    public function GetOneByVendor(int $vendor_id, int $id): bool
    {
        $area = Area::where('vendor_id', $vendor_id)->where('id', $id)->first();
        if (!$area) {
            return false;
        }
        return true;
    }

    /**
     * @return array
     */
    public function GetAll(): Collection
    {
        $areas = Area::with('subDistricts','subDistricts.district','subDistricts.district.provinces')->get();
        if (!$areas) {
            return [];
        }
        return $areas;
    }
}