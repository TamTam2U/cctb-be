<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Response;
use App\Http\Controllers\Controller;
use App\Services\Auth\IAuthService;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class RefreshTokenController extends Controller
{
    public function __construct(public IAuthService $authService) {}

    public function action()
    {
        try {
            $newToken = $this->authService->RefreshToken();
            return Response::success(data: [
                'token' => $newToken
            ], message: 'Token Refreshed', statusCode: 200);
        } catch (TokenExpiredException $e) {
            return Response::error('Token Expired', 401);
        } catch (TokenInvalidException $e) {
            return Response::error('Invalid token provided', 401);
        } catch (JWTException $e) {
            return Response::error('Token is missing', 400);
        }
    }
}
