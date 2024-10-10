<?php

namespace App\Services\Setting;

use App\Models\Setting;
use App\Models\SettingCctv;

class SettingService implements ISettingService
{
    /**
     * @param string $code
     * @param string $name
     * @param string $grid
     * @param int $vendor_id
     * 
     * @return Setting
     */
    public function CreateSetting(string $code, string $name, string $grid, int $vendor_id): Setting
    {
        $setting = new Setting();
        $setting->code = $code;
        $setting->name = $name;
        $setting->grid = $grid;
        $setting->vendor_id = $vendor_id;
        $setting->save();

        return $setting;
    }

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return bool
     */
    public function AddCctvtoSetting(int $setting_id, int $cctv_id): bool
    {
        $setting = new SettingCctv();
        $setting->setting_id = $setting_id;
        $setting->cctv_id = $cctv_id;
        $save = $setting->save();

        if (!$save) {
            return false;
        }
        return true;
    }

    /**
     * @param int $id
     * 
     * @return Setting
     */
    public function GetSetting(int $id): Setting|bool
    {
        $setting = Setting::where('id', $id)->first();
        if (!$setting) {
            return false;
        }
        return $setting;
    }

    /**
     * @param int $id
     * @param int $cctv
     * 
     * @return bool
     */
    public function CheckCapacity(int $id, int $cctv): bool
    {
        $setting = Setting::where('id', $id)->first();
        $grid_values = explode('x', $setting->grid);
        $max_capacity = $grid_values[0] * $grid_values[1];

        if ($cctv > $max_capacity) {
            return false;
        }

        return true;
    }

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return bool
     */
    public function EditCcvtToSetting(int $setting_id, int $cctv_id): bool
    {
        $query = SettingCctv::query();
        $setting = $query->where('setting_id', $setting_id)->get();
        if (!$setting) {
            return false;
        }
        $new_cctv = [];
        
        collect($setting)->each(function ($item) use (&$new_cctv, $cctv_id) {
            if ($item->cctv_id != $cctv_id) {
                $new_cctv[] = $item->cctv_id;
            }else {
                $new_cctv[] = $cctv_id;
            }
        });

        $status = true;
        foreach ($new_cctv as $cctv) {
            $setting = new SettingCctv();
            $setting->setting_id = $setting_id;
            $setting->cctv_id = $cctv;
            $save = $setting->save();

            if (!$save) {
                $status = false;
            }
        }

        if ($status == false) {
            return false;
        }

        return true;
    }

    /**
     * @param int $id
     * 
     * @return array
     */
    public function GetCctvSetting(int $id): array
    {
        $setting = SettingCctv::where('setting_id', $id)->get();
        $cctv = [];
        collect($setting)->each(function ($item) use (&$cctv) {
            $cctv[] = $item->cctv_id;
        });

        return $cctv;
    }

    /**
     * @param int $setting_id
     * @param int $cctv_id
     * 
     * @return bool
     */
    public function RemoveCctvFromSetting(int $setting_id, int $cctv_id): bool
    {
        $setting = SettingCctv::where('setting_id', $setting_id)->where('cctv_id', $cctv_id)->first();
        if (!$setting) {
            return false;
        }
        $delete = $setting->delete();
        if (!$delete) {
            return false;
        }
        return true;
    }
}
