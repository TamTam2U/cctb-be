<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Services\Cctv\ICctvService;
use App\Services\Setting\ISettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCctvToSettingController extends Controller
{
    public function __construct(public ISettingService $settingService, public ICctvService $cctvService)
    {
        
    }

    public function action(Request $request)
    {
        DB::beginTransaction();
        $setting_id = $request->id;
        $cctv_id = $request->input('cctv');
        
        $check_setting = $this->settingService->GetSetting($setting_id);
        if (!$check_setting){
            return response()->json([
                'message' => 'Setting not found',
                'status' => false
            ], 404);
        }

        $check_capacity = $this->settingService->CheckCapacity($setting_id, count($cctv_id));
        if (!$check_capacity) {
            return response()->json([
                'message' => 'Cctv capacity out of limit',
                'status' => false
            ], 400);
        }

        $status = true;
        foreach ($cctv_id as $cctv) {
            $check_cctv = $this->cctvService->GetOneCctv($cctv);
            if (!$check_cctv) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Cctv not found',
                    'status' => false
                ], 404);
            }
            $check = $this->settingService->AddCctvtoSetting($setting_id, $cctv);
            if (!$check) {
                $status = false;
            }
        }
        if ($status == false) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to add cctv to setting',
                'status' => false
            ], 500);
        }
        DB::commit();
        return response()->json([
            'message' => 'Success add cctv to setting',
            'status' => true
        ], 200);
    }
}