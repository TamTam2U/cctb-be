<?php

namespace App\Http\Controllers\Auth;

use App\Helper\DateTimeFormat;
use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Requests\LoginRequest;
use App\Services\Auth\IAuthService;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function __construct(public IAuthService $authService) {}


    public function action(LoginRequest $request)
    {
        $cek = $this->authService->CheckEmail($request->safe()->email);
        if (!$cek) {
            return Response::error('Email tidak ditemukan', 404);
        }

        $cekAuth = auth()->guard('api')->attempt(['email' => $request->safe()->email, 'password' => $request->safe()->password]);
        if (!$cekAuth) {
            return Response::error('Login Failed', 401);
        }

        $payload = JWTAuth::setToken($cekAuth)->getPayload();
        $expired = DateTimeFormat::unixToFormattedDatetime($payload->get('exp'));
        
        return Response::success(data: [
            'token' => $cekAuth,
            'expired_at' => $expired
        ], message: 'Login Success', statusCode: 200);
    }
}
