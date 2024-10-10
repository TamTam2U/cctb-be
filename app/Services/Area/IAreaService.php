<?php

namespace App\Services\Area;

use App\Models\Area;
use Illuminate\Database\Eloquent\Collection;

interface IAreaService
{
    /**
     * @param int $id
     * 
     * @return Area
     */
    public function GetOne(int $id): Area;

    /**
     * @param int $vendor_id
     * @param int $id
     * 
     * @return bool
     */
    public function GetOneByVendor(int $vendor_id,int $id): bool;

    /**
     * @return Collection
     */
    public function GetAll(): Collection;
}