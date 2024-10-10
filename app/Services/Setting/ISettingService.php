<?php

namespace App\Services\Setting;

use App\Models\Setting;
use App\Models\SettingCctv;

interface ISettingService
{
    /**
     * @param string $code
     * @param string $name
     * @param string $grid
     * @param int $vendor_id
     * 
     * @return Setting
     */
    public function CreateSetting(string $code, string $name, string $grid, int $vendor_id): Setting;

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return Bool
     */
    public function AddCctvtoSetting(int $setting_id, int $cctv_id): bool;

    /**
     * @param int $id
     * 
     * @return Setting
     */
    public function GetSetting(int $id): Setting|bool;

    /**
     * @param int $id
     * @param int $cctv
     * 
     * @return bool
     */
    public function CheckCapacity(int $id, int $cctv): bool;

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return bool
     */
    public function EditCcvtToSetting(int $setting_id, int $cctv_id): bool;

    /**
     * @param int $id
     * 
     * @return array
     */
    public function GetCctvSetting(int $id): array;

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return bool
     */
    public function RemoveCctvFromSetting(int $setting_id, int $cctv_id): bool;
}