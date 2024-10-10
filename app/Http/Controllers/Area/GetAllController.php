<?php

namespace App\Http\Controllers\Area;

use App\Http\Controllers\Controller;
use App\Services\Area\IAreaService;
use Illuminate\Http\Request;

class GetAllController extends Controller
{
    public function __construct(public IAreaService $areaService) {}

    public function action(Request $request)
    {
        $areas = $this->areaService->getAll();

        return response()->json($areas);
    }
}
