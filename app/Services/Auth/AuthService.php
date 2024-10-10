<?php

namespace App\Services\Auth;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements IAuthService
{
    /**
     * @param string $email
     * 
     * @return User
     */
    public function CheckEmail(string $email): User
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return false;
        }
        return $user;
    }

    /**
     * @return string
     */
    public function RefreshToken(): string
    {
        $newToken = JWTAuth::parseToken()->refresh();

        return $newToken;
    }

    public function ValidateToken(string $token): bool
    {
        $user = JWTAuth::parseToken()->authenticate($token);
        if (!$user) {
            return false;
        }
        return true;
    }
}
