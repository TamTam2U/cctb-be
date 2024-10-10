<?php

namespace App\Services\Auth;

use App\Models\User;

interface IAuthService
{
    /**
     * @param string $email
     * 
     * @return User
     */
    public function CheckEmail(string $email): User;

    /**
     * @return string
     */
    public function RefreshToken(): string;

    /**
     * @param string $token
     * 
     * @return bool
     */
    public function ValidateToken(string $token): bool;
}