<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Services\Area\IAreaService;
use App\Services\Auth\IAuthService;
use Illuminate\Http\Request;

class CheckTokenController extends Controller
{
    public function __construct(public IAuthService $authService, public IAreaService $areaService) {}

    public function action(Request $request)
    {
        $type = $request->input('type');
        $vendor = $request->input('vendor');
        $token = $request->input('token');

        if ($type == 'area') {
            $check = $this->areaService->GetOneByVendor($vendor, $token);
            if (!$check) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        } else if ($type == 'admin' || $type == 'operator') {
            $check = $this->authService->ValidateToken($token);
            if (!$check) {
                return response()->json(['status' => false]);
            }
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
